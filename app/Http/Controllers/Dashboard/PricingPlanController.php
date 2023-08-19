<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $pricingPlans = PricingPlan::all();
        return view('dashboard.pricing.index',compact('pricingPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $planData = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'billing_cycle' => $request->input('billing_cycle'),
                'max_users' => $request->input('max_users'),
                'trial_days' => $request->input('trial_days'),
            ];

            PricingPlan::create($planData);

            return redirect()->route('dashboard.pricing.index')->with('success', 'Pricing plan created successfully.');
        }catch (\Exception $e) {
            dd($e);
            return redirect()->route('dashboard.pricing.index')->with(['error' => __('global.data_error')]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $plan = PricingPlan::find($id);
        return view('dashboard.pricing.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{

            $plan = PricingPlan::find($id);
            $plan->update($request->all());
            return redirect()->route('dashboard.pricing.index')->with('success', 'Pricing plan Updated successfully.');
        }catch (\Exception $e) {
            return redirect()->route('dashboard.pricing.index')->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try{
            PricingPlan::destroy($id);
            return redirect()->route('dashboard.pricing.index')->with('success', 'Pricing plan Deleted successfully.');

        }catch (\Exception $e){
            return redirect()->route('dashboard.pricing.index')->with(['error' => __('global.data_error')]);

        }
    }

    public function changeStatus($id): RedirectResponse
    {
        try {
            $plan = PricingPlan::find($id);
            $status = $plan->status = 0 ? 1 : 0;
            $plan->update(['status' => $status]);

            return redirect()->route('dashboard.pricing.index')->with(['success'=>__('global.status_changed')]);

        }
        catch (\Exception $e) {

            return redirect()->route('dashboard.pricing.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
