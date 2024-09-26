<?php

namespace App\Services;

use App\Models\PricingPlan;
use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Paypal
{
    private string $baseURL;
    private string $mode;
    private PendingRequest $client;

    public function __construct()
    {
        $this->mode = config('paypal.mode');

        $this->loadBaseURL();

        $this->client = Http::baseUrl($this->baseURL)
            ->withToken($this->generateToken());
    }

    private function getCLientID()
    {
        return config("paypal.{$this->mode}.client_id");
    }

    private function getSecretKey()
    {
        return config("paypal.{$this->mode}.secret_key");
    }

    private function loadBaseURL()
    {
        if ($this->mode === 'live') {
            $this->baseURL = 'https://api-m.paypal.com/v1';
        } else {
            $this->baseURL = 'https://api-m.sandbox.paypal.com/v1';
        }
    }

    /**
     * @param array $data{name, description, type, category, image_url, home_url}
     * @return string name
     * @throws Exception
     */
    public function createProduct(string $name): array
    {
        return $this->client->post('/catalogs/products', [
            'name' => $name,
            'type' => 'SERVICE',
            'category' => 'SOFTWARE',
        ])
            ->throw()
            ->json();
    }

    public function createPlan(PricingPlan $plan)
    {
        return $this->client->post('/billing/plans', [
            'product_id'     => $plan->product_reference_id,
            'name'           => $plan->name,
            'description'    => $plan->description,
            'billing_cycles' => [
                [
                    'frequency' => [
                        'interval_unit'  => 'DAY',
                        'interval_count' => $plan->trial_days,
                    ],
                    'tenure_type'   => 'TRIAL',
                    'sequence'      => 1,
                    'total_cycles'  => 1,
                ],
                [
                    'frequency' => [
                        'interval_unit'  => $plan->billing_cycle === 'monthly' ? 'MONTH' : 'YEAR',
                        'interval_count' => 1,
                    ],
                    'tenure_type'  => 'REGULAR', // Regular billing starts after the trial
                    'sequence'     => 2,         // Sequence 2 for regular billing
                    'total_cycles' => 12,        // 12-month subscription
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value'         => $plan->price,
                            'currency_code' => 'USD',
                        ],
                    ],
                ],
            ],
            'payment_preferences' => [
                'auto_bill_outstanding'   => true,
                'setup_fee'               => [
                    'value'         => $plan->price,
                    'currency_code' => 'USD',
                ],
                'setup_fee_failure_action' => 'CONTINUE',
                'payment_failure_threshold' => 3,
            ],
            'taxes' => [
                'percentage' => '0',
                'inclusive'  => false,
            ],
        ])
            ->throw()
            ->json();
    }

    private function generateToken()
    {
        $response = Http::baseUrl($this->baseURL)
            ->asForm()
            ->withBasicAuth($this->getCLientID(), $this->getSecretKey())
            ->post('/oauth2/token', ['grant_type' => 'client_credentials'])
            ->throw();

        return $response->json('access_token');
    }
}
