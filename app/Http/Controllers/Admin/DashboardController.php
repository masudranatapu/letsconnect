<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\User;
use App\Theme;
use App\Gateway;
use App\Setting;
use App\Currency;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();
        $overall_income = Transaction::where('payment_status', 'Success')->sum('transaction_amount');
        $today_income = Transaction::where('payment_status', 'Success')->whereDate('created_at', Carbon::today())->sum('transaction_amount');
        $overall_users = User::where('role_id', 2)->where('status', 1)->count();
        $today_users = User::where('role_id', 2)->where('status', 1)->whereDate('created_at', Carbon::today())->count();
        $themes = Theme::where('status', 1)->count();
        $plans = Plan::where('status', 1)->count();
        $gateways = Gateway::where('status', 1)->count();

        return view('admin.home', compact('overall_income', 'today_income', 'overall_users', 'today_users', 'themes', 'plans', 'gateways', 'currency', 'settings'));
    }


    public function ContactMsg()
    {
        $settings = Setting::where('status', 1)->first();
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        return view('admin.contact.index', compact('settings', 'contact'));
    }


    public function ContactDestroy(Request $request)
    {
       $contact = DB::table('contacts')->where('id', $request->query('id'))->delete();
       alert()->success(trans('Deleted Successfully!'));
       return redirect()->back();
    }

    public function SubscriberList()
    {
         $settings = Setting::where('status', 1)->first();
         $subscriber = DB::table('subscribers')->orderBy('id', 'DESC')->get();
         return view('admin.subscriber.index', compact('settings','subscriber'));
    }

    public function UserGideVideo()
    {
         $settings = Setting::where('status', 1)->first();
         $data = DB::table('tutorials')->first();
         return view('admin.tutorial.index', compact('settings', 'data'));
    }

    public function UserGideVideoUpdate(Request $request, $id)
    {
       $request->validate([
            'title' => 'required',
            'video' => 'required',
       ]);  

        $data = array();
        $data['title'] = $request->title;
        $data['video'] = $request->video;
        DB::table('tutorials')->where('id', $id)->update($data);
        alert()->success(trans('Updated Successfully!'));
       return redirect()->back();
    }



}
