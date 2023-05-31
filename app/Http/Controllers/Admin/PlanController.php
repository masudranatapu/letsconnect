<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\Setting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Stripe\StripeClient;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        /** PayPal api context **/
        $paypal_configuration = DB::table('config')->get();

        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration[4]->config_value, $paypal_configuration[5]->config_value));
        $this->_api_context->setConfig(array(
            'mode' => $paypal_configuration[3]->config_value,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'DEBUG',
        ));
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */

    // All Plans
    public function plans()
    {
        $plans = Plan::get();
        $currencies = Setting::where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        return view('admin.plans.plans', compact('plans', 'currencies', 'settings', 'config'));
    }

    // Add Plan
    public function addPlan()
    {
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();
        return view('admin.plans.add-plan', compact('settings', 'config'));
    }

    // Save Plan
    public function savePlan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'no_of_vcards' => 'required'
        ]);


        if ($request->personalized_link == null) {
            $personalized_link = 0;
        } else {
            $personalized_link = 1;
        }

        if ($request->hide_branding == null) {
            $hide_branding = 0;
            $is_watermark_enabled = 0;
        } else {
            $hide_branding = 1;
            $is_watermark_enabled = 1;
        }

        if ($request->free_setup == null) {
            $free_setup = 0;
        } else {
            $free_setup = 1;
        }

        if ($request->free_support == null) {
            $free_support = 0;
        } else {
            $free_support = 1;
        }

        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        if ($request->validity >= 360) {
            $interval = 'year';
        } else {
            $interval = 'month';
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $config = DB::table('config')->get();

        $stripe = new StripeClient($config[10]->config_value);

        $product = $stripe->products->create([
            'name' => $request->plan_name
        ]);

        $stripe_plan = $stripe->plans->create([
            'amount' => $request->plan_price * 100,
            'currency' => 'usd',
            'interval' => $interval,
            'product' => $product->id,
        ]);
//
////            $planStripeData['plan_id'] = $plan->id;
////            $plan_details->stripe_data = json_encode($planStripeData);
////            $plan_details->stripe_plan = $plan->id;
////            $plan_details->name = $plan_details->plan_name;
////            $plan_details->slug = Str::slug($plan_details->plan_name);
////            $plan_details->save();
//
//        return $stripe_plan;

        $plan = new Plan;
        $plan->plan_id = uniqid();
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->recommended = $recommended;
        $plan->plan_price = $request->plan_price;
        $plan->validity = $request->validity;
        $plan->no_of_vcards = $request->no_of_vcards;
        $plan->plans_type = 1;
        // $plan->no_of_services = $request->no_of_services;
        // $plan->no_of_galleries = $request->no_of_galleries;
        // $plan->no_of_features = $request->no_of_features;
        // $plan->no_of_paymenno_of_servicests = $request->no_of_payments;
        $plan->personalized_link = $personalized_link;
        $plan->hide_branding = $hide_branding;
        $plan->free_setup = $free_setup;
        $plan->free_support = $free_support;
        $plan->is_watermark_enabled = $is_watermark_enabled;
        $plan->stripe_data = json_encode($stripe_plan);
        $plan->stripe_plan_id = $stripe_plan->id;
        $plan->name = $plan->plan_name;
        $plan->slug = Str::slug($plan->plan_name);
        $plan->features = json_encode($request->get('feature') ?? []);
        $plan->save();
        alert()->success(trans('New Plan Created Successfully!'));
        return redirect()->route('admin.add.plan');
    }

    // Edit Plan
    public function editPlan(Request $request, $id)
    {
        $plan_id = $request->id;
        $plan_details = Plan::where('plan_id', $plan_id)->first();
        $settings = Setting::where('status', 1)->first();
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            return view('admin.plans.edit-plan', compact('plan_details', 'settings'));
        }
    }

    public function shareableUpdate($id)
    {
        $plan_details = Plan::where('plan_id', $id)->first();
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            if ($plan_details->shareable == 1){
                $plan_details->update(['shareable' => 0]);
                alert()->success(trans('Plan has been shareable Successfully!'));
                return back();
            }else{
                $plan_details->update(['shareable' => 1]);
                alert()->success(trans('Plan has been non shareable Successfully!'));
                return back();
            }
        }
    }

    // Update Plan
    public function updatePlan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan_id' => 'required',
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'no_of_vcards' => 'required'
        ]);

        if ($request->personalized_link == null) {
            $personalized_link = 0;
        } else {
            $personalized_link = 1;
        }

        if ($request->hide_branding == null) {
            $hide_branding = 0;
            $is_watermark_enabled = 0;
        } else {
            $hide_branding = 1;
            $is_watermark_enabled = 1;
        }

        if ($request->free_setup == null) {
            $free_setup = 0;
        } else {
            $free_setup = 1;
        }

        if ($request->free_support == null) {
            $free_support = 0;
        } else {
            $free_support = 1;
        }

        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        Plan::where('plan_id', $request->plan_id)->update([
            'plan_name' => $request->plan_name,
            'plan_description' => $request->plan_description,
            'recommended' => $recommended,
            'plan_price' => $request->plan_price,
            'validity' => $request->validity,
            'no_of_vcards' => $request->no_of_vcards,
            'personalized_link' => $personalized_link,
            'hide_branding' => $hide_branding,
            'free_setup' => $free_setup,
            'free_support' => $free_support,
            'is_watermark_enabled' => $is_watermark_enabled,
            'features' => json_encode($request->get('feature') ?? [])
        ]);
        alert()->success(trans('Plan Details Updated Successfully!'));
        return redirect()->route('admin.edit.plan', $request->plan_id);
    }

    // Delete Plan
    public function deletePlan(Request $request)
    {
        $plan_details = Plan::where('plan_id', $request->query('id'))->first();
        if ($plan_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        Plan::where('plan_id', $request->query('id'))->update(['status' => $status]);
        alert()->success(trans('Plan Status Updated Successfully!'));
        return redirect()->route('admin.plans');
    }
}
