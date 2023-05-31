<?php

namespace App\Http\Controllers\Payment;

use App\Plan;
use App\User;
use App\Setting;
use Carbon\Carbon;
use App\Transaction;
use App\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{

    public function webhook()
    {
        return Auth::user();
    }
    public function stripeCheckout(Request $request, $planId)
    {
        if (Auth::user()) {
            try {
                $config = DB::table('config')->get();
                $plan_details = Plan::query()
                    ->where('plan_id', $planId)
                    ->where('status', 1)
                    ->first();

                if ($plan_details->stripe_plan_id == null) {
                    alert()->error(trans("Stripe payment is not available for this plan. \n Please Try Again!"));
                    return redirect()->back();
                }

                $userData = Auth::user();
                $price_id = $plan_details->stripe_plan_id;
                $stripe = new StripeClient($config[10]->config_value);

                if ($userData->stripe_customer_id == null) {
                    $customer = $stripe->customers->create([
                        'name' => $userData->name,
                        'email' => $userData->email,
                        'source' => $request->stripeToken
                    ]);
                    $customer_id = $customer->id;
                } else {
                    $customer_id = $userData->stripe_customer_id;
                }

                $subscription = $stripe->subscriptions->create([
                    'customer' => $customer_id,
                    'items' => [[
                        'price' => $price_id,
                    ]],
                ]);

                $activation_date = Carbon::parse($subscription->start_date)->format('Y-m-d h:i:s');
                $plan_validity = Carbon::parse($subscription->start_date)->addDays($plan_details->validity);

//                $settings = Setting::query()
//                    ->where('status', 1)
//                    ->first();

                $userStripeData = Auth::user()->stripe_data ?? "[]";
                $userStripeData = json_decode($userStripeData, true);

                if ($plan_details == null) {
                    return view('errors.404');
                } else {

//                    dd($plan_details);
//                    $userData->update([
//                        'plan_id' => $plan_data->plan_id,
//                        'paypal_data' => $paypal_payment_details,
//                        'term' => $plan_data->validity,
//                        'plan_validity' => $plan_validity,
//                        'plan_activation_date' => $activation_date,
//                        'plan_details' => json_encode(Session::get('plan_details')),
//                        'paid_with' => 1
//                    ]);

//                    return $subscription;
                    $userData->update([
                        'plan_id' => $plan_details->plan_id,
                        'stripe_data' => json_encode($subscription),
                        'stripe_customer_id' => $customer_id,
                        'plan_details' => json_encode($plan_details),
                        'plan_activation_date' => $activation_date,
                        'plan_validity' => $plan_validity,
                        'term' => $plan_details->validity,
                        'paid_with' => 0
                    ]);

                    $amountToBePaid = ((int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_details->plan_price);
                    $amountToBePaidPaise = $amountToBePaid * 100;

                    $gobiz_transaction_id = uniqid();

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
                    $invoice_details['to_billing_name'] = $userData->billing_name;
                    $invoice_details['to_billing_address'] = $userData->billing_address;
                    $invoice_details['to_billing_city'] = $userData->billing_city;
                    $invoice_details['to_billing_state'] = $userData->billing_state;
                    $invoice_details['to_billing_zipcode'] = $userData->billing_zipcode;
                    $invoice_details['to_billing_country'] = $userData->billing_country;
                    $invoice_details['to_billing_phone'] = $userData->billing_phone;
                    $invoice_details['to_billing_email'] = $userData->billing_email;
                    $invoice_details['to_vat_number'] = $userData->vat_number;
                    $invoice_details['tax_name'] = $config[24]->config_value;
                    $invoice_details['tax_type'] = $config[14]->config_value;
                    $invoice_details['tax_value'] = $config[25]->config_value;
                    $invoice_details['invoice_amount'] = $amountToBePaid;
                    $invoice_details['subtotal'] = $plan_details->plan_price;
                    $invoice_details['tax_amount'] = (int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100;

//                    $paymentMethods = $request->user()->paymentMethods();
//                    $payment_intent = $request->user()->createSetupIntent();
//                    $intent = $payment_intent->client_secret;
//                    $paymentId = $subscription->id;
                    // If order is created from stripe
//                    if (isset($intent)) {
                        $transaction = new Transaction();
                        $transaction->gobiz_transaction_id = $gobiz_transaction_id;
                        $transaction->transaction_date = now();
                        $transaction->transaction_id = $subscription->id;
                        $transaction->user_id = Auth::user()->id;
                        $transaction->plan_id = $plan_details->plan_id;
                        $transaction->desciption = $plan_details->plan_name . " Plan";
                        $transaction->payment_gateway_name = "Stripe";
                        $transaction->transaction_amount = $amountToBePaid;
                        $transaction->transaction_currency = $config[1]->config_value;
                        $transaction->invoice_details = json_encode($invoice_details);
                        $transaction->payment_status = "Success";
                        $transaction->save();
//                        return view('user.checkout.pay-with-stripe', compact('settings', 'plan_details', 'gobiz_transaction_id', 'config', 'paymentId'));
//                    }
                }

                alert()->success(trans('Plan subscription success!'));
                return redirect()->route('user.plans');

            } catch (Exception $error) {

                alert()->error(trans("Something went wrong!"));
                return redirect()->back();

            }
        }else{
            return redirect()->route('login');
        }


        if (Auth::user()) {
            $config = DB::table('config')->get();
            $userData = User::where('id', Auth::user()->id)->first();

            $settings = Setting::query()
                ->where('status', 1)
                ->first();
            $plan_details = Plan::query()
                ->where('plan_id', $planId)
                ->where('status', 1)
                ->first();

            $userStripeData = Auth::user()->stripe_data ?? "[]";
            $userStripeData = json_decode($userStripeData, true);

//            return $userStripeData;

            if ($plan_details == null) {
                return view('errors.404');
            } else {

                $stripePlan = $plan_details->stripe_plan;



//                if (!$stripePlan) {
//                    $stripePlan = $this->createStripePlan($config, $plan_details);
//                }
//
//                $stripeCustomerId = $stripeData['customer_id'] ?? null;
//
//
//                if (!$stripeCustomerId) {
//                    $stripeCustomerId = $this->createStripeCustomer($config, $userStripeData);
//                }
//                Stripe::setApiKey($config[10]->config_value);

                $stripe = new StripeClient($config[10]->config_value);
                $customer = $stripe->customers->create([
                    'name' => $userData->name,
                    'email' => $userData->email,
//                    'payment_method' => 'pm_card_visa'
                ]);


                $stripe->subscriptions->create([
                    'customer' => $customer->id,
                    'items' => [
                        ['price' => 'price_1L6zMLIY8R27Jx6MiSYRljBa'],
                    ],
                ]);


                return $customer;


                $amountToBePaid = ((int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_details->plan_price);
                $amountToBePaidPaise = $amountToBePaid * 100;

                $gobiz_transaction_id = uniqid();

//                $payment_intent = PaymentIntent::create([
//                    'description' => $plan_details->plan_name . " Plan",
//                    'shipping' => [
//                        'name' => Auth::user()->name,
//                        'address' => [
//                            'line1' => Auth::user()->billing_address,
//                            'postal_code' => Auth::user()->billing_zipcode,
//                            'city' => Auth::user()->billing_city,
//                            'state' => Auth::user()->billing_state,
//                            'country' => Auth::user()->billing_country,
//                        ],
//                    ],
//                    'amount' => (int)$amountToBePaidPaise,
//                    'currency' => $config[1]->config_value,
//                    'payment_method_types' => ['card'],
//                ]);

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
                $invoice_details['to_billing_name'] = $userData->billing_name;
                $invoice_details['to_billing_address'] = $userData->billing_address;
                $invoice_details['to_billing_city'] = $userData->billing_city;
                $invoice_details['to_billing_state'] = $userData->billing_state;
                $invoice_details['to_billing_zipcode'] = $userData->billing_zipcode;
                $invoice_details['to_billing_country'] = $userData->billing_country;
                $invoice_details['to_billing_phone'] = $userData->billing_phone;
                $invoice_details['to_billing_email'] = $userData->billing_email;
                $invoice_details['to_vat_number'] = $userData->vat_number;
                $invoice_details['tax_name'] = $config[24]->config_value;
                $invoice_details['tax_type'] = $config[14]->config_value;
                $invoice_details['tax_value'] = $config[25]->config_value;
                $invoice_details['invoice_amount'] = $amountToBePaid;
                $invoice_details['subtotal'] = $plan_details->plan_price;
                $invoice_details['tax_amount'] = (int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100;

//                return $request->user();
                $paymentMethods = $request->user()->paymentMethods();
                $payment_intent = $request->user()->createSetupIntent();
                $intent = $payment_intent->client_secret;
                $paymentId = $payment_intent->id;
                // If order is created from stripe
                if (isset($intent)) {
                    $transaction = new Transaction();
                    $transaction->gobiz_transaction_id = $gobiz_transaction_id;
                    $transaction->transaction_date = now();
                    $transaction->transaction_id = $paymentId;
                    $transaction->user_id = Auth::user()->id;
                    $transaction->plan_id = $plan_details->plan_id;
                    $transaction->desciption = $plan_details->plan_name . " Plan";
                    $transaction->payment_gateway_name = "Stripe";
                    $transaction->transaction_amount = $amountToBePaid;
                    $transaction->transaction_currency = $config[1]->config_value;
                    $transaction->invoice_details = json_encode($invoice_details);
                    $transaction->payment_status = "PENDING";
                    $transaction->save();
                    return view('user.checkout.pay-with-stripe', compact('settings', 'intent', 'plan_details', 'gobiz_transaction_id', 'config', 'paymentId'));
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function stripeToken(Request $request)
    {
        $stripe = new StripeClient('sk_test_51L5UFzIY8R27Jx6M9JghugsndjalSWLKBdGr6lvAu08ladRJG0jRDJ7CTic0IRxUDKpCibBaOhUOHR97OYrOYqa900z3vy6iU9');
        $userData = Auth::user();
        $price_id = 'price_1L6zMLIY8R27Jx6MiSYRljBa';


    }

    public function stripePaymentStatus(Request $request, $paymentId)
    {
//        dd($request->all(), $paymentId);
        if (!$paymentId) {
            return view('errors.404');
        } else {
            $orderId = $paymentId;
            $config = DB::table('config')->get();
            $stripe = new StripeClient($config[10]->config_value);

            $plan = Plan::query()
                ->where('id', '=', $request->get('plan'))
                ->first();

            try {
//                $stripePlan = $stripe->plans->retrieve($plan->stripe_plan, []);
//                $payment = $stripe->paymentIntents->retrieve($paymentId, []);
                $setupIntent = $stripe->setupIntents->retrieve($paymentId, []);
                $user = $request->user();
                $paymentMethod = $setupIntent->payment_method;

                Stripe::setApiKey($config[10]->config_value);

                $subscriptions = $user->subscriptions(Str::slug($plan->plan_name))->active()->get();
                foreach ($subscriptions as $subscription) {
                    $subscription->cancelNow();
                }

                $user->createOrGetStripeCustomer();
                $user->updateDefaultPaymentMethod($paymentMethod);
                $user->newSubscription(Str::slug($plan->plan_name), $plan->stripe_plan)
                    ->create($paymentMethod, [
                        'email' => $user->email,
                    ]);
                $payment = new \stdClass();
                $payment->status = "succeeded";
            } catch (\Exception $e) {
//                dd($e);
                $payment = new \stdClass();
                $payment->status = "error";
            }

            if ($payment->status == "succeeded") {

                $transaction_details = Transaction::where('transaction_id', $orderId)->where('status', 1)->first();
                $user_details = User::find(Auth::user()->id);

                $plan_data = Plan::where('plan_id', $transaction_details->plan_id)->first();
                $term_days = $plan_data->validity;

                if ($user_details->plan_validity == "") {

                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);

                    $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                    $invoice_number = $invoice_count + 1;

                    Transaction::where('transaction_id', $orderId)->update([
                        'transaction_id' => $paymentId,
                        'invoice_prefix' => $config[15]->config_value,
                        'invoice_number' => $invoice_number,
                        'payment_status' => 'SUCCESS',
                    ]);

                    User::where('user_id', Auth::user()->user_id)->update([
                        'plan_id' => $transaction_details->plan_id,
                        'paid_with' => 0,
                        'term' => $term_days,
                        'plan_validity' => $plan_validity,
                        'plan_activation_date' => now(),
                        'plan_details' => $plan_data
                    ]);

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
                        'invoice_id' => $config[15]->config_value . $invoice_number,
                        'invoice_date' => $transaction_details->created_at,
                        'description' => $transaction_details->desciption,
                        'email_heading' => $config[27]->config_value,
                        'email_footer' => $config[28]->config_value,
                    ];

                    try {
                        Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                    } catch (\Exception $e) {

                    }

                    alert()->success(trans('Plan subscription success!'));
                    return redirect()->route('user.plans');
                } else {

                    $message = "";

                    if ($user_details->plan_id == $transaction_details->plan_id) {

                        // Check if plan validity is expired or not.
                        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                        $current_date = Carbon::now();
                        $remaining_days = $current_date->diffInDays($plan_validity, false);

                        if ($remaining_days > 0) {
                            $plan_validity = Carbon::parse($user_details->plan_validity);
                            $plan_validity->addDays($term_days);
                            $message = "Plan subscribed successfully!";
                        } else {
                            $plan_validity = Carbon::now();
                            $plan_validity->addDays($term_days);
                            $message = "Plan subscribed successfully!";
                        }
                    } else {

                        // Making all cards inactive, For Plan change
                        BusinessCard::where('user_id', Auth::user()->user_id)->update([
                            'card_status' => 'inactive',
                        ]);

                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($term_days);
                        $message = "Plan subscribed successfully!";
                    }

                    $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                    $invoice_number = $invoice_count + 1;

                    Transaction::where('transaction_id', $orderId)->update([
                        'transaction_id' => $paymentId,
                        'invoice_prefix' => $config[15]->config_value,
                        'invoice_number' => $invoice_number,
                        'payment_status' => 'SUCCESS',
                    ]);

                    User::where('user_id', Auth::user()->user_id)->update([
                        'plan_id' => $transaction_details->plan_id,
                        'term' => $term_days,
                        'plan_validity' => $plan_validity,
                        'plan_activation_date' => now(),
                        'plan_details' => $plan_data
                    ]);

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
                        'invoice_id' => $config[15]->config_value . $invoice_number,
                        'invoice_date' => $transaction_details->created_at,
                        'description' => $transaction_details->desciption,
                        'email_heading' => $config[27]->config_value,
                        'email_footer' => $config[28]->config_value,
                    ];

                    try {
                        Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                    } catch (\Exception $e) {

                    }

                    alert()->success($message);
                    return redirect()->route('user.plans');
                }
            } else {

                Transaction::where('transaction_id', $orderId)->update([
                    'transaction_id' => $paymentId,
                    'payment_status' => 'FAILED',
                ]);

                alert()->error(trans("Something went wrong!"));
                return redirect()->route('user.plans');
            }
        }
    }





//    private function createStripePlan($config, $plan_details): string
//    {
//        $stripe = new StripeClient($config[10]->config_value);
//
//        try {
//            $product = $stripe->products->create([
//                'name' => $plan_details->plan_name
//            ]);
//
//            $plan = $stripe->plans->create([
//                'amount' => $plan_details->plan_price * 100,
//                'currency' => 'usd',
//                'interval' => 'month',
//                'product' => $product->id,
//            ]);
//
//            $planStripeData['plan_id'] = $plan->id;
//            $plan_details->stripe_data = json_encode($planStripeData);
//            $plan_details->stripe_plan = $plan->id;
//            $plan_details->name = $plan_details->plan_name;
//            $plan_details->slug = Str::slug($plan_details->plan_name);
//            $plan_details->save();
//
//            return $plan->id;
//        } catch (\Exception $e) {
//        }
//
//        return '';
//    }
}
