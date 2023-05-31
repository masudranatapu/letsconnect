<?php

namespace App\Http\Controllers\User;

use App\BusinessCard;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Setting;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Payment\PaypalController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PlanController extends Controller
{
    public function planRenew(Request $request)
    {
        $user = Auth::user();
        $active_plan = json_decode($user->plan_details);
        $transaction = Transaction::where('plan_id', $active_plan->plan_id)
            ->where('user_id', $user->id)
            ->orderBy('id', 'DESC')
            ->first();
        $valid_date = Carbon::parse($transaction->transaction_date)->addDays($active_plan->validity);

        if (Carbon::now()>$valid_date){
            app(PaypalController::class)->paywithpaypal($request,$active_plan->plan_id);
            return response()->json(['success'=>true]);
        }
//        return response()->json($valid_date);

    }

    public function showPlan()
    {
        Session::forget('plan_id');
        $id = \request()->id;
        Session::put('plan_id', $id);
        $homePage       = DB::table('pages')->where('page_name', 'home')->get();
        $supportPage    = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $plan_details  = Plan::where('plan_id', '=', $id)->first();
        $settings       = Setting::where('status', 1)->first();
        $config         = DB::table('config')->get();
        $currency       = Currency::where('iso_code', $config['1']->config_value)->first();
        return view('user.plans.public-plan', compact('homePage', 'plan_details', 'supportPage', 'settings', 'currency', 'config'));

    }
}
