<?php

namespace App\Http\Controllers\User;

use App\Jobs\Subscriptions;
use App\Template;
use App\TemplateContent;
use App\User;
use App\Setting;
use App\Currency;
use Carbon\Carbon;
use App\BusinessCard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Agreement;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Stripe\StripeClient;

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
    public function index()
    {
        $base_url = config('app.url');
        if (Session::get('plan_id') && (url()->previous() == $base_url.'plan?id='.Session::get('plan_id') || url()->previous() == $base_url.'login' || url()->previous() == $base_url.'register?id='.Session::get('plan_id'))){
            return redirect()->route('user.checkout',Session::get('plan_id'));
        }
        $config = DB::table('config')->get();

        $stripe = new StripeClient($config[10]->config_value);

        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);
        $active_paypal_plan = json_decode($plan->paypal_data);
        $active_stripe_plan = json_decode($plan->stripe_data);
        $settings = Setting::where('status', 1)->first();
        $business_card = BusinessCard::where('user_id', Auth::user()->user_id)->count();
        $remaining_days = 0;

        if($active_paypal_plan || $active_stripe_plan){
            Subscriptions::dispatch(null, $plan);
        }

//        if ($active_stripe_plan){
//            $stripe->subscriptions->retrieve(
//                $active_stripe_plan->id,
//                []
//            );
//
//            User::where('id',Auth::id())->update(['stripe_data' => $active_stripe_plan]);
//        }

        $paypalDetails = null;
        if ($active_paypal_plan) {
            $paypalDetails = Agreement::get($active_paypal_plan->id, $this->_api_context);
        }

        if ($active_plan == null) {
            if ($paypalDetails == null || $paypalDetails->state != 'Active') {
                return redirect()->route('user.plans');
            }
        } else {
            if (isset($active_plan)) {

                $plan_validity = Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);
            }
            return view('user.home', compact('settings', 'active_plan', 'remaining_days', 'business_card'));
        }
    }


    public function UserGide()
    {
        $settings = Setting::where('status', 1)->first();
        $data = DB::table('tutorials')->first();
        return view('user.tutorial.index', compact('settings', 'data'));
    }


    public function UserSignature()
    {
//        $base_url = config('app.url');
//        if (Session::get('plan_id') && (url()->previous() == $base_url.'plan?id='.Session::get('plan_id') || url()->previous() == $base_url.'login' || url()->previous() == $base_url.'register?id='.Session::get('plan_id'))){
//            return redirect()->route('user.checkout',Session::get('plan_id'));
//        }
//        $config = DB::table('config')->get();
//
//        $stripe = new StripeClient($config[10]->config_value);
//
//        $plan = User::where('user_id', Auth::user()->user_id)->first();
//        $active_plan = json_decode($plan->plan_details);
//        $active_paypal_plan = json_decode($plan->paypal_data);
//        $active_stripe_plan = json_decode($plan->stripe_data);
//        $settings = Setting::where('status', 1)->first();
//        $business_card = BusinessCard::where('user_id', Auth::user()->user_id)->count();
//        $remaining_days = 0;
//
//        if($active_paypal_plan || $active_stripe_plan){
//            Subscriptions::dispatch(null, $plan);
//        }
//
////        if ($active_stripe_plan){
////            $stripe->subscriptions->retrieve(
////                $active_stripe_plan->id,
////                []
////            );
////
////            User::where('id',Auth::id())->update(['stripe_data' => $active_stripe_plan]);
////        }
//
//        $paypalDetails = null;
//        if ($active_paypal_plan) {
//            $paypalDetails = Agreement::get($active_paypal_plan->id, $this->_api_context);
//        }
//
//        if ($active_plan == null) {
//            if ($paypalDetails == null || $paypalDetails->state != 'Active') {
//                return redirect()->route('user.plans');
//            }
//        } else {
//            if (isset($active_plan)) {
//
//                $plan_validity = Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
//                $current_date = Carbon::now();
//                $remaining_days = $current_date->diffInDays($plan_validity, false);
//            }
//            return view('user.home', compact('settings', 'active_plan', 'remaining_days', 'business_card'));
//        }

        $settings = Setting::where('status', 1)->first();
        $templates = TemplateContent::where('user_id', Auth::id())->get();
        return view('user.signature.index', compact('settings','templates'));
    }

    public function UserSignatureRemove($id)
    {
        $template = TemplateContent::where('id', $id)->first();
        if ($template->status == 1){
            $template->status = 0;
            $template->save();
        }else{
            $template->status = 1;
            $template->save();
        }
        alert()->success(trans('Signature has been deactived successfully!'));
        return back();
    }

    public function UserSignatureStore(Request $request)
    {
        $check_template = TemplateContent::where('template_id', $request->id)->get();

        if (count($check_template) <= 0) {
            $template_content = new TemplateContent;
            $template_content->user_id = Auth::id();
            $template_content->template_id = $request->id;
            $template_content->name = $request->name;
            $template_content->designation = $request->designation;
            $template_content->facebook_link = $request->facebook_link;
            $template_content->twitter_link = $request->twitter_link;
            $template_content->linkedin_link = $request->linkedin_link;
            $template_content->youtube_link = $request->youtube_link;
            $template_content->whatsapp_link = $request->whatsapp_link;
            $template_content->reddit_link = $request->reddit_link;
            $template_content->phone_no = $request->phone_no;
            $template_content->mobile_no = $request->mobile_no;
            $template_content->email = $request->email;
            $template_content->webmail = $request->webmail;
            $template_content->website_link = $request->website_link;
            $template_content->details = $request->details;
            $template_content->instagram_link = $request->instagram_link;
            $template_content->titok_link = $request->titok_link;
            if ($request->avatar){
                $avatar = '/signatures/' . 'IMG-' . uniqid() . '-' . time() . '.' . $request->avatar->extension();
                $request->avatar->move(public_path('signatures'), $avatar);
                $template_content->avatar = url('/').$avatar;
            }
            $template_content->save();
            alert()->success(trans('Signature has been Created Successfully!'));
        }

        return redirect()->route('user.user.signature');

    }

    public function UserOwnSignatureEdit($id)
    {
        $settings = Setting::where('status', 1)->first();
        $template_contents = TemplateContent::where('id', $id)->first();
        $template = Template::where('id', $template_contents->template_contents->id)->first();
        return view('user.signature.own_signature_edit', compact('settings', 'template','template_contents'));
    }
    public function UserOwnSignatureUpdate(Request $request)
    {
        $template = TemplateContent::where('id', $request->id)->first();
        if ($request->avatar){
            $avatar = '/signatures/' . 'IMG-' . uniqid() . '-' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('signatures'), $avatar);
            $new_avatar = url('/').$avatar;
        }else {
            $new_avatar = $template->avatar;
        }


        TemplateContent::where('id', $request->id)->update([
            'name' => $request->name,
            'avatar' => $new_avatar,
            'designation' => $request->designation,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
            'whatsapp_link' => $request->whatsapp_link,
            'reddit_link' => $request->reddit_link,
            'phone_no' => $request->phone_no,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'webmail' => $request->webmail,
            'website_link' => $request->website_link,
            'details' => $request->details,
            'instagram_link' => $request->instagram_link,
            'titok_link' => $request->titok_link,
        ]);

        alert()->success(trans('Signature has been Updated Successfully!'));

        return redirect()->back();

    }

    public function UserTemplate()
    {
        $settings = Setting::where('status', 1)->first();
        $templates = Template::all();
        return view('user.signature.templates', compact('settings','templates'));
    }

    public function UserSignatureCreate()
    {
//        return \request()->id;
        $settings = Setting::where('status', 1)->first();
        $template = Template::where('id', request()->id)->first();
//        $template_contents = TemplateContent::where('template_id', \request()->id)->get();
//        return $template_contents;
        return view('user.signature.create', compact('settings', 'template'));
    }
}
