<?php

namespace App\Http\Controllers\User;

use App\Jobs\Subscriptions;
use App\Mail\SendEmailInvoice;
use App\Plan;
use App\Transaction as TransactionModel;
use App\User;
use App\Theme;
use App\Medias;
use App\Gallery;
use App\Gateway;
use App\Payment;
use App\Service;
use App\Setting;
use App\Currency;
use Carbon\Carbon;
use App\Transaction;
use App\BusinessCard;
use App\BusinessHour;
use App\StoreProduct;
use App\BusinessField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Jorenvh\Share\ShareFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Stripe\Stripe;
use Stripe\StripeClient;

class CardController extends Controller
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

    // All user cards
    public function vcards()
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        if ($active_plan != null) {
            $business_cards = DB::table('business_cards')
                ->where('card_type', '=', 'vcard')
                ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                ->select('users.user_id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->user_id)
                ->where('business_cards.status', 1)
                ->orderBy('business_cards.id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();
            return view('user.cards.vcards', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    public function storeCards()
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        if ($active_plan != null) {
            $business_cards = DB::table('business_cards')
                ->where('card_type', '=', 'store')
                ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                ->select('users.user_id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->user_id)
                ->where('business_cards.status', 1)
                ->orderBy('business_cards.id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();
            return view('user.cards.store-cards', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    public function modernCardView(Request $request, $id)
    {
        $card = BusinessCard::query()
            ->with(['business_card_fields_json'])
            ->where('card_id', '=', $id)
            ->first();

        $card->theme_color = $request->get('theme_color');
        $card->save();

        $videos = [];
        foreach ($request->get('video_title') as $key => $title) {
            $url = $request->get('video_url')[$key];
            $description = $request->get('video_description')[$key];

            if ($url || $description || $title) {
                $videos[] = [
                    'title' => $title,
                    'description' => $description,
                    'url' => $url
                ];
            }
        }

        $testimonial = [];
        foreach ($request->get('testimonial_detail') as $key => $detail) {
            $name = $request->get('testimonial_name')[$key];

            if ($name || $detail) {
                $testimonial[] = [
                    'name' => $name,
                    'detail' => $detail
                ];
            }
        }

        $icons = get_icons();

        $data = [
            "name" => $request->get('name'),
            "designation" => $request->get('designation'),
            "email" => $request->get('email'),
            "connect" => $request->get('connect'),
            "ccode1" => $request->get('ccode1'),
            "phone" => $request->get('phone'),
            "comment" => $request->get('comment'),
            "linkedin" => $request->get('linkedin'),
            "facebook" => $request->get('facebook'),
            "instagram" => $request->get('instagram'),
            "contacts" => $request->get('contacts'),
            "website" => $request->get('website'),
            "youtube" => $request->get('youtube'),
            "map" => $request->get('map'),
            "snapchat" => $request->get('snapchat'),
            "spotify" => $request->get('spotify'),
            "twitch" => $request->get('twitch'),
            "messenger" => $request->get('messenger'),
            "skype" => $request->get('skype'),
            "soundcloud" => $request->get('soundcloud'),
            "paypal" => $request->get('paypal'),
            "vimeo" => $request->get('vimeo'),
            "telegram" => $request->get('telegram'),
            "flickr" => $request->get('flickr'),
            "about_title" => $request->get('about_title'),
            "about_details" => $request->get('about_details'),
            "videos" => $videos,
            "testimonials" => $testimonial
        ];

        $iconData = [];
        foreach ($data as $key => $value) {
            if (key_exists($key, $icons) && $value) {
                $iconData[$key] = [
                    'icon' => $icons[$key],
                    'value' => $value
                ];
            }
        }

        return view('vcard.modern-card-view', compact('card', 'iconData', 'data'))->render();
    }

    public function plans()
    {
        if(Session::get('paypal_payment_details')){
            $transaction = TransactionModel::where('user_id', Auth::id())->latest()->first();
//            $user = Auth::user();
            if($transaction){
                Subscriptions::dispatch($transaction->transaction_id, null);
            }
            $this->dataStore();

            Session::forget('paypal_plan_details');
            Session::forget('paypal_payment_details');
            Session::forget('plan_details');
            Session::forget('plan_id');
        }

        $plans = DB::table('plans')->where('status', 1)->get();
        $config = DB::table('config')->get();
        $free_plan = Transaction::where('user_id', Auth::user()->id)->where('transaction_amount', '0')->count();
        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);
        $settings = Setting::where('status', 1)->first();
        $currency = Currency::where('iso_code', $config[1]->config_value)->first();
        $remaining_days = 0;
        $is_subscription_active = 0;
        if (Auth::user()->paid_with == 0) {
            $is_subscription_active = Auth::user()->subscriptions()->active()->count();
        } if (Auth::user()->paid_with == 1) {
            $is_subscription_active = 1;
        } else if ($free_plan) {
            $is_subscription_active = 1;
        }

        if (isset($active_plan)) {
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_date = Carbon::now();
            $remaining_days = $current_date->diffInDays($plan_validity, false);
        }

//        dd($active_plan);
        return view('user.plans.plans', compact('is_subscription_active', 'plans', 'plan', 'settings', 'currency', 'active_plan', 'remaining_days', 'config', 'free_plan'));
    }

    public function dataStore()
    {
        $userData = Auth::user();
        $config = DB::table('config')->get();
        $paypal_plan_details = Session::get('paypal_plan_details');
        $paypal_payment_details = Session::get('paypal_payment_details');
        $plan_data = Session::get('plan_details');
        $activation_date = Carbon::parse($paypal_payment_details->start_date)->format('Y-m-d h:i:s');
        $plan_validity = Carbon::parse($paypal_payment_details->start_date)->addDays($plan_data->validity);
        $payer_details = $paypal_payment_details->payer->payer_info;
        $invoice_count = TransactionModel::where("invoice_prefix", $config[15]->config_value)->count();
        $invoice_number = $invoice_count + 1;

        $userData->update([
            'paypal_plan_id' => $paypal_plan_details->getId(),
            'plan_id' => $plan_data->plan_id,
            'paypal_data' => $paypal_payment_details,
            'term' => $plan_data->validity,
            'plan_validity' => $plan_validity,
            'plan_activation_date' => $activation_date,
            'plan_details' => json_encode(Session::get('plan_details')),
            'paid_with' => 1
        ]);

        $invoice_details = [];
        $invoice_details['from_billing_name'] = $config[16]->config_value;
        $invoice_details['from_billing_address'] = $config[19]->config_value;
        $invoice_details['from_billing_city'] = $config[20]->config_value;
        $invoice_details['from_billing_state'] = $config[21]->config_value;
        $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
        $invoice_details['from_billing_country'] = $config[23]->config_value;
        $invoice_details['from_vat_number'] = $config[26]->config_value;
        $invoice_details['from_billing_phone'] = $config[18]->config_value;
        $invoice_details['from_billing_email'] = $config[17]->config_value;
        $invoice_details['to_billing_name'] = $payer_details->first_name . $payer_details->last_name;
        $invoice_details['to_billing_address'] = $payer_details->shipping_address->line1 . $payer_details->shipping_address->line2;
        $invoice_details['to_billing_city'] = $payer_details->shipping_address->city;
        $invoice_details['to_billing_state'] = $payer_details->shipping_address->state;
        $invoice_details['to_billing_zipcode'] = $payer_details->shipping_address->postal_code;
        $invoice_details['to_billing_country'] = $payer_details->shipping_address->country_code;
        $invoice_details['to_billing_email'] = $payer_details->email;
        $invoice_details['tax_name'] = $config[24]->config_value;
        $invoice_details['tax_type'] = $config[14]->config_value;
        $invoice_details['tax_value'] = $config[25]->config_value;
        $invoice_details['invoice_amount'] = $paypal_payment_details->plan->payment_definitions[0]->amount->value;
        $invoice_details['subtotal'] = $plan_data->plan_price;
        $invoice_details['tax_amount'] = (int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100;


        // Store into Database before starting PayPal redirect
        $transaction = new TransactionModel();
        $transaction->gobiz_transaction_id = uniqid();
        $transaction->transaction_date = now();
        $transaction->transaction_id = $paypal_payment_details->getId();
        $transaction->user_id = Auth::user()->id;
        $transaction->plan_id = $plan_data->plan_id;
        $transaction->desciption = $plan_data->plan_name . " Plan";
        $transaction->payment_gateway_name = "PayPal";
        $transaction->transaction_amount = $paypal_payment_details->plan->payment_definitions[0]->amount->value;
        $transaction->transaction_currency = $config[1]->config_value;
        $transaction->invoice_prefix = $config[15]->config_value;
        $transaction->invoice_number = $invoice_number;
        $transaction->invoice_details = json_encode($invoice_details);
        $transaction->payment_status = 'SUCCESS';
        $transaction->save();

        $this->invoiceSend($transaction, $config);
    }

    public function invoiceSend($transaction_details,$config)
    {
        $encode = json_decode($transaction_details['invoice_details'], true);

        $details = [
            'from_billing_name' => $encode['from_billing_name'],
            'from_billing_email' => $encode['from_billing_email'],
            'from_billing_address' => $encode['from_billing_address'],
            'from_billing_city' => $encode['from_billing_city'],
            'from_billing_state' => $encode['from_billing_state'],
            'from_billing_country' => $encode['from_billing_country'],
            'from_billing_zipcode' => $encode['from_billing_zipcode'],
            'gobiz_transaction_id' => $transaction_details->gobiz_transaction_id,
            'to_billing_name' => $encode['to_billing_name'],
            'invoice_currency' => $transaction_details->transaction_currency,
            'subtotal' => $encode['subtotal'],
            'tax_amount' => $encode['tax_amount'],
            'invoice_amount' => $encode['invoice_amount'],
            'invoice_id' => $config[15]->config_value . $transaction_details->invoice_number,
            'invoice_date' => $transaction_details->created_at,
            'description' => $transaction_details->desciption,
            'email_heading' => $config[27]->config_value,
            'email_footer' => $config[28]->config_value,
        ];

//        try {
//            Mail::to($encode['to_billing_email'])->send(new SendEmailInvoice($details));
//        } catch (Exception $e) {
//            exit(1);
//        }
    }

    public function cancelPlan(Plan $plan)
    {
        $transaction = TransactionModel::where('plan_id', $plan->plan_id)->latest()->first();

        $user = Auth::user();
        if ($user->paid_with == 0) {
            $config = DB::table('config')->get();
            $stripe = new StripeClient($config[10]->config_value);

            $stripe->subscriptions->cancel(
                $transaction->transaction_id,
                []
            );
//            Stripe::setApiKey($config[10]->config_value);
//            $user->subscription()->cancel();

            $user->update([
                'plan_id' => null,
                'plan_details' => null,
                'plan_validity' => null,
                'stripe_data' => null,
                'plan_activation_date' => null
            ]);

            return redirect()->to(route('user.plans'))->with(['success' => 'Plan cancelled.']);
            // Stripe
        } else if ($user->paid_with == 1) {
            // Paypal
            return redirect()->route('cancelWithPaypal', $transaction->transaction_id);
        }
    }


    // View Card Preview
    public function viewPreview(Request $request, $id)
    {

        $card_details = BusinessCard::query()
            ->with(['theme', 'business_card_fields_json'])
            ->where('card_id', $id)
            ->where('status', 1)
            ->first();


        if (isset($card_details)) {
            if ($card_details->card_type == "store") {
                $enquiry_button = '#';

                $business_card_details = BusinessCard::query()
                    ->where('business_cards.card_id', $card_details->card_id)
                    ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                    ->select('business_cards.*', 'users.plan_details')
                    ->first();

                if ($business_card_details) {

                    $products = DB::table('store_products')->where('card_id', $card_details->card_id)->where('product_status', 'instock')->orderBy('id', 'desc')->get();

                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();

                    $plan_details = json_decode($business_card_details->plan_details, true);
                    $store_details = json_decode($business_card_details->description, true);

                    if ($store_details['whatsapp_no'] != null) {
                        $enquiry_button = $store_details['whatsapp_no'];
                    }

                    $whatsapp_msg = $store_details['whatsapp_msg'];
                    $currency = $store_details['currency'];

                    $url = URL::to('/') . "/" . strtolower(preg_replace('/\s+/', '-', $card_details->card_url));
                    $business_name = $card_details->title;
                    $profile = URL::to('/') . "/" . $business_card_details->profile;

                    $shareContent = $config[30]->config_value;
                    $shareContent = str_replace("{ business_name }", $business_name, $shareContent);
                    $shareContent = str_replace("{ business_url }", $url, $shareContent);
                    $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);

                    // If branding enabled,then show app name.

                    if ($plan_details['hide_branding'] == "1") {
                        $shareContent = str_replace("{ appName }", $business_name, $shareContent);
                    } else {
                        $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);
                    }

                    $url = urlencode($url);
                    $shareContent = urlencode($shareContent);

                    Session::put('locale', $business_card_details->card_lang);
                    app()->setLocale(Session::get('locale'));

                    $qr_url = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . $url;

                    $shareComponent['facebook'] = "https://www.facebook.com/sharer/sharer.php?u=$url&quote=$shareContent";
                    $shareComponent['twitter'] = "https://twitter.com/intent/tweet?text=$shareContent";
                    $shareComponent['linkedin'] = "https://www.linkedin.com/shareArticle?mini=true&url=$url";
                    $shareComponent['telegram'] = "https://telegram.me/share/url?text=$shareContent&url=$url";
                    $shareComponent['whatsapp'] = "https://api.whatsapp.com/send/?phone&text=$shareContent";

                    if ($card_details->theme_id == "7ccc432a06hty") {
                        return view('vcard.modern-store-light', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency'));
                    } else if ($card_details->theme_id == "7ccc432a06hju") {
                        return view('vcard.modern-store-dark', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency'));
                    }
                } else {
                    alert()->error(trans('Sorry,Please fill basic business details.'));
                    return redirect()->route('user.edit.card', $id);
                }
            } else {

                $enquiry_button = null;
                $business_card_details = BusinessCard::query()
                    ->where('business_cards.card_id', $card_details->card_id)
                    ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                    ->select('business_cards.*', 'users.plan_details')
                    ->first();

                if ($business_card_details) {

                    $feature_details = DB::table('business_fields')->where('card_id', $card_details->card_id)->get();
                    $service_details = DB::table('services')->where('card_id', $card_details->card_id)->orderBy('id', 'asc')->get();
                    $galleries_details = DB::table('galleries')->where('card_id', $card_details->card_id)->orderBy('id', 'asc')->get();
                    $payment_details = DB::table('payments')->where('card_id', $card_details->card_id)->get();
                    $business_hours = DB::table('business_hours')->where('card_id', $card_details->card_id)->first();
                    $make_enquiry = DB::table('business_fields')->where('card_id', $card_details->card_id)->where('type', 'wa')->first();

                    if ($make_enquiry != null) {
                        $enquiry_button = $make_enquiry->content;
                    }

                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();

                    $plan_details = json_decode($business_card_details->plan_details, true);

                    $url = URL::to('/') . "/" . strtolower(preg_replace('/\s+/', '-', $card_details->card_url));
                    $business_name = $card_details->title;
                    $profile = URL::to('/') . "/" . $business_card_details->profile;

                    $shareContent = $config[30]->config_value;
                    $shareContent = str_replace("{ business_name }", $business_name, $shareContent);
                    $shareContent = str_replace("{ business_url }", $url, $shareContent);
                    $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);

                    // If branding enabled,then show app name.

                    if ($plan_details['hide_branding'] == "1") {
                        $shareContent = str_replace("{ appName }", $business_name, $shareContent);
                    } else {
                        $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);
                    }

                    $url = urlencode($url);
                    $shareContent = urlencode($shareContent);

                    Session::put('locale', $business_card_details->card_lang);
                    app()->setLocale(Session::get('locale'));

                    $qr_url = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . $url;

                    $shareComponent['facebook'] = "https://www.facebook.com/sharer/sharer.php?u=$url&quote=$shareContent";
                    $shareComponent['twitter'] = "https://twitter.com/intent/tweet?text=$shareContent";
                    $shareComponent['linkedin'] = "https://www.linkedin.com/shareArticle?mini=true&url=$url";
                    $shareComponent['telegram'] = "https://telegram.me/share/url?text=$shareContent&url=$url";
                    $shareComponent['whatsapp'] = "https://api.whatsapp.com/send/?phone&text=$shareContent";

                    if ($card_details->theme->theme_type == 1) {
                        $card_data = $card_details->business_card_fields_json;
                        $iconData = [];

                        if ($card_data) {
                            $card_data = json_decode($card_data->content ?? "[]", true);

                            $icons = get_icons();
                            $name = $card_data['name'] ?? '';
                            foreach ($card_data as $key => $value) {
                                if ($key == 'email' && $value) {
                                    $value = 'mailto:' . $value;
                                } else if ($key == 'connect' && $value) {
                                    $route = route('profile', $id);
                                    $value = "sms:{$value}?&body=Hey there, I am sharing {$name} LetsConnect Card because I think they would be a great asset to you. https://letsconnect.site/{$route}";
                                } else if ($key == 'phone' && $value) {
                                    $value = 'tel:' . $value;
                                }else if (($key == 'comment' || $key == 'comment') && $value) {
                                    $value = 'sms:' . $value;
                                }

                                if (key_exists($key, $icons) && $value) {
                                    $iconData[$key] = [
                                        'icon' => $icons[$key],
                                        'value' => $value
                                    ];
                                }
                            }
                        } else {
                            $card_data = [];
                        }

                        return view('vcard.smart-card', [
                            'iconData' => $iconData,
                            'data' => $card_data,
                            'card_details' => $card_details,
                            'business_card_details' => $business_card_details,
                        ]);


                    } else if ($card_details->theme_id == "7ccc432a06caa") {
                        return view('vcard.modern-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vta") {
                        return view('vcard.modern-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06cth") {
                        return view('vcard.classic-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vyw") {
                        return view('vcard.classic-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06ctw") {
                        return view('vcard.metro-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vhd") {
                        return view('vcard.metro-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    }
                } else {
                    alert()->error(trans('Sorry,Please fill basic business details.'));
                    return redirect()->route('user.company.details', $id);
                }
            }
        } else {
            http_response_code(404);
            return view('errors.404');
        }
    }

    // Create Card
    public function CreateCard()
    {
        $themes = Theme::where('theme_description', 'vCard')->where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        if ($cards < $plan_details->no_of_vcards) {
            return view('user.cards.create-card', compact('themes', 'settings', 'plan_details'));
        } else {
            alert()->error(trans('Maximum card creation limit is exceeded,Please upgrade your plan.'));
            return redirect()->route('user.cards');
        }
    }

    // Save card
    public function saveBusinessCard(Request $request)
    {
//        dd($request->All());
        $validator = Validator::make($request->all(), [
            'theme_id' => 'required',
            'cover' => 'required',
            'logo' => 'required',
//            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT", "2048"),
//            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT", "2048"),
        ]);

        if ($validator->fails()) {
            alert()->error(trans('Some fields missing or cover/logo size is large.'));
            return back();
        }

        $cardId = uniqid();
        if ($request->link) {
            $personalized_link = $request->link;
        } else {
            $personalized_link = $cardId;
        }
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);

//        $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
//        $cover = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->cover->getClientOriginalName()) . '.' . $request->cover->extension();

//        $request->logo->move(public_path('backend/img/vCards'), $logo);
//        $request->cover->move(public_path('backend/img/vCards'), $cover);

        $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));

        $current_card = BusinessCard::where('card_url', $card_url)->count();

        if ($current_card == 0) {
            // Checking,If the user plan allowed card creation is less than created card.
            if ($cards < $plan_details['no_of_vcards']) {
                try {
                    $theme = Theme::query()
                        ->where('theme_id', '=', $request->theme_id)
                        ->first();

                    $card_id = $cardId;
                    $card = new BusinessCard();
                    $card->card_id = $card_id;
                    $card->user_id = Auth::user()->user_id;
                    $card->theme_id = $request->theme_id;
                    $card->theme_color = $request->card_color;
                    $card->card_lang = $request->card_lang ?? 'en';
                    $card->cover = $request->cover;
                    $card->profile = $request->logo;
                    $card->card_url = $card_url;
                    $card->card_type = 'vcard';
                    $card->title = $request->title ?? 'title';
                    $card->sub_title = $request->subtitle ?? 'sub title';
                    $card->save();

                    alert()->success(trans('New Business Card Created Successfully!'));

                    if ($theme->theme_type == 1) {
                        return redirect()->route('user.modern-card.edit', $card_id);
                    }
                    return redirect()->route('user.social.links', $card_id);
                } catch (\Exception $th) {
                    alert()->error(trans('Sorry,personalized link was already registered.'));
                    return redirect()->route('user.create.card');
                }
            } else {
                alert()->error(trans('Maximum card creation limit is exceeded,Please upgrade your plan to add more card(s).'));
                return redirect()->route('user.create.card');
            }
        } else {
            alert()->error(trans('Sorry,personalized link was already registered.vcdfsf'));
            return redirect()->route('user.create.card');
        }
    }

    // Social Links
    public function socialLinks()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        return view('user.cards.social-links', compact('plan_details', 'settings'));
    }

    // Save social links
    public function saveSocialLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                BusinessField::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_features) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {


                            $customContent = $request->value[$i];


                            if ($request->type[$i] == 'youtube') {
                                $customContent = str_replace('https://www.youtube.com/watch?v=', '', $request->value[$i]);
                            }

                            if ($request->type[$i] == 'map') {
                                if (substr($request->value[$i], 0, 3) == 'pb=') {
                                    $customContent = $request->value[$i];
                                } else {
                                    $customContent = str_replace('<iframe src="', '', $request->value[$i]);
                                    $customContent = substr($customContent, 0, strpos($customContent, '" '));
                                    $customContent = str_replace('https://www.google.com/maps/embed?', '', $customContent);
                                }
                            }


                            $field = new BusinessField();
                            $field->card_id = $id;
                            $field->type = $request->type[$i];
                            $field->icon = $request->icon[$i];
                            $field->label = $request->label[$i];
                            $field->content = $customContent;
                            $field->position = $i + 1;
                            $field->save();

                        } else {
                            alert()->error(trans('Atleast add one feature.'));
                            return redirect()->route('user.social.links', $id);
                        }
                    }
                    alert()->success(trans('features details updated'));
                    return redirect()->route('user.payment.links', $id);
                } else {
                    alert()->error(trans('You have reached plan features limited.'));
                    return redirect()->route('user.social.links', $id);
                }
            } else {
                alert()->error(trans('Atleast add one feature.'));
                return redirect()->route('user.social.links', $id);
            }
        }
    }

    // Payment links
    public function paymentLinks()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        return view('user.cards.payment-links', compact('plan_details', 'settings'));
    }

    // Save payment links
    public function savePaymentLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                Payment::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_payments) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {
                            $payment = new Payment();
                            $payment->card_id = $id;
                            $payment->type = $request->type[$i];
                            $payment->icon = $request->icon[$i];
                            $payment->label = $request->label[$i];
                            $payment->content = $request->value[$i];
                            $payment->position = $i + 1;
                            $payment->save();
                        } else {
                            alert()->error(trans('Please fill all required fields.'));
                            return redirect()->route('user.payment.links', $id);
                        }
                    }
                    alert()->success(trans('Payment details updated'));
                    return redirect()->route('user.services', $id);
                } else {
                    alert()->error(trans('You have reached plan payments limited.'));
                    return redirect()->route('user.payment.links', $id);
                }
            } else {
                alert()->success(trans('Payment details updated'));
                return redirect()->route('user.services', $id);
            }
        }
    }

    // Services
    public function services($id)
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::query()
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('id', 'desc')
            ->get();
        $settings = Setting::query()->where('status', 1)->first();
        $card = BusinessCard::query()
            ->with(['business_card_fields_json'])
            ->where('card_id', '=', $id)
            ->first();
        $fields = $card->business_card_fields_json ?? [];
        if ($fields) {
            $fields = json_decode($fields->content ?? "[]", true);
        }

        return view('user.cards.services', compact('card', 'fields', 'plan_details', 'settings', 'media'));
    }

    public function modernCard($id)
    {
//        dd(43545);
        $config = DB::table('config')->get();

        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        if($plan_details->no_of_vcards){
            $plan_details->no_of_vcards = (int) $plan_details->no_of_vcards;
        }else{
             $plan_details->no_of_vcards = 0;
        }

        if($plan_details->no_of_services){
            $plan_details->no_of_services = (int) $plan_details->no_of_services;
        }else{
             $plan_details->no_of_services = 0;
        }

        if($plan_details->no_of_galleries){
            $plan_details->no_of_galleries = (int) $plan_details->no_of_galleries;
        }else{
             $plan_details->no_of_galleries = 0;
        }

        if($plan_details->no_of_features){
            $plan_details->no_of_features = (int) $plan_details->no_of_features;
        }else{
             $plan_details->no_of_features = 0;
        }

        if($plan_details->no_of_payments){
            $plan_details->no_of_payments = (int) $plan_details->no_of_payments;
        }else{
             $plan_details->no_of_payments = 0;
        }


        $media = Medias::query()
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('id', 'desc')
            ->get();
        $settings = Setting::query()->where('status', 1)->first();
        $card = BusinessCard::query()
            ->with(['business_card_fields_json'])
            ->where('card_id', '=', $id)
            ->first();
        $fields = $card->business_card_fields_json ?? [];
        if ($fields) {
            $fields = json_decode($fields->content ?? "[]", true);
        }

        return view('user.cards.services', compact('card','config', 'fields', 'plan_details', 'settings', 'media'));
    }

    public function updateModernCard(Request $request, $id)
    {
        $card = BusinessCard::query()
            ->where('card_id', '=', $id)
            ->first();

        if (!$card) {
            return view('errors.404');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        try {
            $videos = [];
            foreach ($request->get('video_title') as $key => $title) {
                $url = $request->get('video_url')[$key];
                $description = $request->get('video_description')[$key];

                if ($url || $description || $title) {
                    $videos[] = [
                        'title' => $title,
                        'description' => $description,
                        'url' => $url
                    ];
                }
            }

            $testimonial = [];
            foreach ($request->get('testimonial_detail') as $key => $detail) {
                $name = $request->get('testimonial_name')[$key];

                if ($name || $detail) {
                    $testimonial[] = [
                        'name' => $name,
                        'detail' => $detail
                    ];
                }
            }

            $data = [
                "name" => $request->get('name'),
                "designation" => $request->get('designation'),
                "email" => $request->get('email'),
                "connect" => $request->get('connect'),
                "ccode1" => $request->get('ccode1'),
                "phone" => $request->get('phone'),
                "comment" => $request->get('comment'),
                "linkedin" => $request->get('linkedin'),
                "facebook" => $request->get('facebook'),
                "instagram" => $request->get('instagram'),
                "contacts" => $request->get('contacts'),
                "website" => $request->get('website'),
                "youtube" => $request->get('youtube'),
                "map" => $request->get('map'),
                "snapchat" => $request->get('snapchat'),
                "spotify" => $request->get('spotify'),
                "twitch" => $request->get('twitch'),
                "messenger" => $request->get('messenger'),
                "skype" => $request->get('skype'),
                "soundcloud" => $request->get('soundcloud'),
                "paypal" => $request->get('paypal'),
                "vimeo" => $request->get('vimeo'),
                "telegram" => $request->get('telegram'),
                "flickr" => $request->get('flickr'),
                "about_title" => $request->get('about_title'),
                "about_details" => $request->get('about_details'),
                "videos" => $videos,
                "testimonials" => $testimonial
            ];

            $businessFields = BusinessField::query()
                ->where('card_id', '=', $id)
                ->first();
            if (!$businessFields) {
                $businessFields = new BusinessField();
                $businessFields->card_id = $id;
            }

            $businessFields->type = 'json';
            $businessFields->icon = 'json';
            $businessFields->label = 'json';
            $businessFields->content = json_encode($data);
            $businessFields->position = 1;
            $businessFields->save();

            if ($request->get('name')) {
                $card->title = $request->get('name');
                $card->description = 'Connect with ' . $request->get('name');
                $card->update();
            }
        } catch (\Exception $e) {
            alert()->error(trans('Card details not updated'));
            dd($e);
        }

        alert()->success(trans('Card details updated'));
        return redirect()->back();
    }

    // Save services
    public function saveServices(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->service_name != null) {

                if (count($request->service_name) <= $plan_details->no_of_services) {

                    for ($i = 0; $i < count($request->service_name); $i++) {
                        $service = new Service();
                        $service->card_id = $id;
                        $service->service_name = $request->service_name[$i];
                        $service->service_image = $request->service_image[$i];
                        $service->service_description = $request->service_description[$i];
                        $service->enable_enquiry = $request->enquiry[$i];
                        $service->save();
                    }
                    alert()->success(trans('Services details updated'));
                    return redirect()->route('user.galleries', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.services', $id);
                }
            } else {
                //Skipping...
                alert()->success(trans('Services details updated'));
                return redirect()->route('user.galleries', $id);
            }
        }
    }

    // Galleries
    public function galleries()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        return view('user.cards.galleries', compact('plan_details', 'media', 'settings'));
    }

    // Save Gallery Images
    public function saveGalleries(Request $request, $id)
    {

        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->caption != null) {

                if (count($request->caption) <= $plan_details->no_of_galleries) {
                    for ($i = 0; $i < count($request->caption); $i++) {
                        $gallery = new Gallery();
                        $gallery->card_id = $id;
                        $gallery->caption = $request->caption[$i];
                        $gallery->gallery_image = $request->gallery_image[$i];
                        $gallery->save();
                    }

                    alert()->success(trans('Gallery images updated'));
                    return redirect()->route('user.business.hours', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.galleries', $id);
                }
            } else {
                alert()->success(trans('Gallery images updated'));
                return redirect()->route('user.business.hours', $id);
            }
        }
    }

    // Business Hours
    public function businessHours()
    {
        $settings = Setting::where('status', 1)->first();

        return view('user.cards.business-hours', compact('settings'));
    }

    // Save business hours
    public function saveBusinessHours(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->monday_closed == "on") {
                $monday = "Closed";
            } else {
                $monday = $request->monday_open . " - " . $request->monday_closing;
            }

            if ($request->tuesday_closed == "on") {
                $tuesday = "Closed";
            } else {
                $tuesday = $request->tuesday_open . " - " . $request->tuesday_closing;
            }

            if ($request->wednesday_closed == "on") {
                $wednesday = "Closed";
            } else {
                $wednesday = $request->wednesday_open . " - " . $request->wednesday_closing;
            }

            if ($request->thursday_closed == "on") {
                $thursday = "Closed";
            } else {
                $thursday = $request->thursday_open . " - " . $request->thursday_closing;
            }

            if ($request->friday_closed == "on") {
                $friday = "Closed";
            } else {
                $friday = $request->friday_open . " - " . $request->friday_closing;
            }

            if ($request->saturday_closed == "on") {
                $saturday = "Closed";
            } else {
                $saturday = $request->saturday_open . " - " . $request->saturday_closing;
            }

            if ($request->sunday_closed == "on") {
                $sunday = "Closed";
            } else {
                $sunday = $request->sunday_open . " - " . $request->sunday_closing;
            }

            if ($request->always_open == "on") {
                $always_open = "Opening";
            } else {
                $always_open = "Closed";
            }

            if ($request->is_display == "on") {
                $is_display = 0;
            } else {
                $is_display = 1;
            }

            $businessHours = new BusinessHour();
            $businessHours->card_id = $id;
            $businessHours->Monday = $monday;
            $businessHours->Tuesday = $tuesday;
            $businessHours->Wednesday = $wednesday;
            $businessHours->Thursday = $thursday;
            $businessHours->Friday = $friday;
            $businessHours->Saturday = $saturday;
            $businessHours->Sunday = $sunday;
            $businessHours->is_always_open = $always_open;
            $businessHours->is_display = $is_display;
            $businessHours->save();
            alert()->success(trans('Your Business Card is Ready.'));
            return redirect()->route('user.cards');
        }
    }

    // Skip business hours
    public function skipAndSave()
    {
        alert()->success(trans('Your Business Card is Ready.'));
        return redirect()->route('user.cards');
    }

    // Card Status Page
    public function cardStatus(Request $request, $id)
    {
        $businessCard = BusinessCard::where('card_id', $id)->first();

        if ($businessCard == null) {
            return view('errors.404');
        } else {
            $business_card = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->first();

            if ($business_card == null) {
                return view('errors.404');
            } else {
                if ($business_card->card_status == 'inactive') {
                    $plan = User::where('user_id', Auth::user()->user_id)->first();
                    $active_plan = json_decode($plan->plan_details);
                    $no_of_features = BusinessField::where('card_id', $id)->count();
                    $no_of_galleries = Gallery::where('card_id', $id)->count();
                    $no_of_payments = Payment::where('card_id', $id)->count();
                    $no_of_services = Service::where('card_id', $id)->count();
                    $no_of_products = StoreProduct::where('card_id', $id)->count();
                    if ($no_of_services <= $active_plan->no_of_services && $no_of_galleries <= $active_plan->no_of_galleries && $no_of_features <= $active_plan->no_of_features && $no_of_payments <= $active_plan->no_of_payments && $no_of_products <= $active_plan->no_of_services) {
                        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                        $plan_details = json_decode($plan->plan_details);

                        if ($cards < $plan_details->no_of_vcards) {
                            BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
                                'card_status' => 'activated',
                            ]);
                            alert()->success(trans('Your Business Card Enabled'));
                            return redirect()->route('user.cards');
                        } else {
                            alert()->error(trans('Maximum card creation limit is exceeded,Please upgrade your plan.'));
                            return redirect()->route('user.cards');
                        }
                    } else {
                        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                        $plan_details = json_decode($plan->plan_details);

                        if ($cards < $plan_details->no_of_vcards) {
                            return redirect()->route('user.edit.card', $id)->with('errors', 'Your plan was downgraded.');
                        } else {
                            alert()->error(trans('Maximum card creation limit is exceeded,Please upgrade your plan.'));
                            return redirect()->route('user.cards');
                        }
                    }
                } else {
                    BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
                        'card_status' => 'inactive',
                    ]);
                    alert()->success(trans('Your Business Card Disabled'));
                    return redirect()->route('user.cards');
                }
            }
        }
    }

    // Checkout Page
    public function checkout(Request $request, $id)
    {
        $selected_plan = Plan::where('plan_id', $id)->first();
        if ($selected_plan == null) {
            alert()->error(trans('Your current plan is not available. Choose another plan.'));
            return redirect()->route('user.plans');
        } else {
            $config = DB::table('config')->get();

            if ($selected_plan == null) {
                return view('errors.404');
            } else {

                if ($selected_plan->status == 1){
                    if ($selected_plan->plan_price == 0) {
                        if (Auth::user()->billing_name == "") {
                            return redirect()->route('user.billing', $id);
                        } else {
                            $invoice_details = [];

                            $invoice_details['from_billing_name'] = $config[16]->config_value;
                            $invoice_details['from_billing_address'] = $config[19]->config_value;
                            $invoice_details['from_billing_city'] = $config[20]->config_value;
                            $invoice_details['from_billing_state'] = $config[21]->config_value;
                            $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
                            $invoice_details['from_billing_country'] = $config[23]->config_value;
                            $invoice_details['from_vat_number'] = $config[26]->config_value;
                            $invoice_details['from_billing_phone'] = $config[18]->config_value;
                            $invoice_details['from_billing_email'] = $config[17]->config_value;
                            $invoice_details['to_billing_name'] = $request->billing_name;
                            $invoice_details['to_billing_address'] = $request->billing_address;
                            $invoice_details['to_billing_city'] = $request->billing_city;
                            $invoice_details['to_billing_state'] = $request->billing_state;
                            $invoice_details['to_billing_zipcode'] = $request->billing_zipcode;
                            $invoice_details['to_billing_country'] = $request->billing_country;
                            $invoice_details['to_billing_phone'] = $request->billing_phone;
                            $invoice_details['to_billing_email'] = $request->billing_email;
                            $invoice_details['to_vat_number'] = $request->vat_number;
                            $invoice_details['tax_name'] = $config[24]->config_value;
                            $invoice_details['tax_type'] = $config[14]->config_value;
                            $invoice_details['tax_value'] = $config[25]->config_value;
                            $invoice_details['invoice_amount'] = 0;
                            $invoice_details['subtotal'] = 0;
                            $invoice_details['tax_amount'] = 0;

                            $transaction = new Transaction();
                            $transaction->gobiz_transaction_id = uniqid();
                            $transaction->transaction_date = now();
                            $transaction->transaction_id = uniqid();
                            $transaction->user_id = Auth::user()->id;
                            $transaction->plan_id = $selected_plan->plan_id;
                            $transaction->desciption = $selected_plan->plan_name . " Plan";
                            $transaction->payment_gateway_name = "FREE";
                            $transaction->transaction_amount = $selected_plan->plan_price;
                            $transaction->transaction_currency = $config[1]->config_value;
                            $transaction->invoice_details = json_encode($invoice_details);
                            $transaction->payment_status = "SUCCESS";
                            $transaction->save();

                            $plan_validity = Carbon::now();
                            $plan_validity->addDays($selected_plan->validity);
                            User::where('user_id', Auth::user()->user_id)->update([
                                'plan_id' => $id,
                                'term' => "9999",
                                'plan_validity' => $plan_validity,
                                'plan_activation_date' => now(),
                                'plan_details' => $selected_plan,
                            ]);
                            // Making all cards inactive,For Plan change
                            BusinessCard::where('user_id', Auth::user()->user_id)->update([
                                'card_status' => 'inactive',
                            ]);
                            alert()->success(trans("FREE Plan activated!"));
                            return redirect()->back();
                        }
                    } else {
                        $settings = Setting::where('status', 1)->first();
                        $config = DB::table('config')->get();
                        $currency = Currency::where('iso_code', $config[1]->config_value)->first();
                        $gateways = Gateway::where('is_status', 'enabled')->where('status', 1)->get();
                        $plan_price = $selected_plan->plan_price;
                        $tax = $config[25]->config_value;
                        $total = ((int)($plan_price) * (int)($tax) / 100) + (int)($plan_price);
                        return view('user.checkout.checkout', compact('settings', 'config', 'currency', 'selected_plan', 'gateways', 'total'));
                    }
                }elseif ($selected_plan->status == 0 && $selected_plan->shareable == 1){
                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();
                    $currency = Currency::where('iso_code', $config[1]->config_value)->first();
                    $gateways = Gateway::where('is_status', 'enabled')->where('status', 1)->get();
                    $plan_price = $selected_plan->plan_price;
                    $tax = $config[25]->config_value;
                    $total = ((int)($plan_price) * (int)($tax) / 100) + (int)($plan_price);
                    return view('user.checkout.checkout', compact('settings', 'config', 'currency', 'selected_plan', 'gateways', 'total'));
                }


            }
        }
    }


    public function checkLink(Request $request)
    {
        $link = $request->link;
        $is_present = DB::table('business_cards')->where('card_url', $link)->count();
        $resp = [];
        $resp['status'] = 'failed';

        if ($is_present == 0) {
            $resp['status'] = 'success';
        } else {
            $resp['status'] = 'failed';
        }

        return response()->json($resp);
    }
}
