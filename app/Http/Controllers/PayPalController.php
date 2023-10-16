<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalController extends Controller
{
    public function payment($plan_id){

        if($plan_id === "success"){
            return $this->success(request());
        }
        session(['plan_id' => $plan_id]);
        $data = [];
        $plan = PricingPlan::find($plan_id);
        $data['items'] = [
            [
                'id' => $plan->id,
                'name' => $plan->name,
                'price' => $plan->price,
//                'desc' => $plan->description,
                'qty' => 1,
            ],
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "order #{$data['invoice_id']} INVOICE";
        $data['return_url'] = 'http://127.0.0.1:8000/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/cancel';
        $data['total'] = $plan->price;

        $provider = new ExpressCheckout;
        $responce = $provider->setExpressCheckout($data,true);
        return redirect($responce['paypal_link']);


    }
    public function success(Request $request){
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS','SUCCESSWITHWARNING'])){
            // approve operation
            $subscription = new Subscription();
            $subscription->user_id = auth()->user()->id; // Assuming you have a user associated with the subscription
            $subscription->plan_id = (int)session('plan_id'); // Replace with the appropriate plan ID
//            $subscription->status = 'active'; // Set the initial status as 'active' or any other status as needed
            $subscription->save();
            return response()->json('Paid Successfully');
        }
        // cancel operation
        return response()->json('Fail Payment', 402);
    }
    public function cancel(){
        //cancel operation
        return response()->json('Payment Cancelled',402);

    }

}
