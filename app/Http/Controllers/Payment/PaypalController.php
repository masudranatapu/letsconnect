<?php

namespace App\Http\Controllers\Payment;

use Config;
use Exception;
use Psy\Util\Json;
use URL;
use App\User;
use Redirect;
use App\BusinessCard;
use App\Mail\SendEmailInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Transaction as TransactionModel;

use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Api\Agreement;
use PayPal\Exception\PPConnectionException;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Payment;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\AgreementStateDescriptor;


class PaypalController extends Controller
{

    // PayPal
    public function __construct()
    {
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

    public function test($id)
    {
        $agreement = Agreement::get($id, $this->_api_context);
        return $agreement;
    }


    public function payWithpaypal(Request $request,$planId)
    {
        if (Auth::user()) {

            $plan_details = DB::table('plans')->where('plan_id', $planId)->where('status', 1)->first();
            $config = DB::table('config')->get();
            Session::put('plan_details', $plan_details);

            if ($plan_details == null) {

                return view('errors.404');

            } else {

                // subscription plan create
                $created_plan = $this->createPlan($plan_details,$config);

                // subscription plan active
                $actived_plan = $this->activePlan($created_plan);

                // subscription agreement create
                $created_agreement = $this->agreementPlan($actived_plan->getId());
                return redirect($created_agreement->getApprovalLink());

            }

        } else {
            return redirect()->route('login');
        }
    }


    public function createPlan($plan_details,$config): Plan
    {
        $plan = new Plan();
        $plan->setName($plan_details->plan_name)
            ->setDescription($plan_details->plan_description)
            ->setType('fixed');

        $paymentDefinition = new PaymentDefinition();
        $amountToBePaid = ((int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_details->plan_price);

        if ($plan_details->validity == 1) {

            $paymentDefinition->setName('Regular Payments')
                ->setType('REGULAR')
                ->setFrequency('DAY')
                ->setFrequencyInterval("1")
                ->setCycles("12")
                ->setAmount(new Currency(array('value' => $amountToBePaid, 'currency' => $config[1]->config_value)));

        }else if ($plan_details->validity == 31) {

            $paymentDefinition->setName('Regular Payments')
                ->setType('REGULAR')
                ->setFrequency('MONTH')
                ->setFrequencyInterval("1")
                ->setCycles("12")
                ->setAmount(new Currency(array('value' => $amountToBePaid, 'currency' => $config[1]->config_value)));

        } elseif ($plan_details->validity == 365) {

            $paymentDefinition->setName('Regular Payments')
                ->setType('REGULAR')
                ->setFrequency('YEAR')
                ->setFrequencyInterval("1")
                ->setCycles("1")
                ->setAmount(new Currency(array('value' => $amountToBePaid, 'currency' => $config[1]->config_value)));
        }

        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(URL::route('execute-agreement',['success'=>true]))
            ->setCancelUrl(URL::route('execute-agreement',['success'=>false]))
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => $amountToBePaid, 'currency' => $config[1]->config_value)));

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        try {
            $created_plan = $plan->create($this->_api_context);
            Session::put('paypal_plan_details', $created_plan);

            return $created_plan;
        } catch (Exception $ex) {
            exit(1);
        }
    }

    public function activePlan($createdPlan): Plan
    {
        $patch = new Patch();

        $value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');

        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);

        try {
            $createdPlan->update($patchRequest, $this->_api_context);

            $plan = Plan::get($createdPlan->getId(), $this->_api_context);

            return $plan;
        }catch (Exception $ex) {
            exit(1);
        }

    }

    public function agreementPlan($id): Agreement
    {
        $startDate = date('c', time() + 3600);
        $agreement = new Agreement();

        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate($startDate);

        $plan = new Plan();
        $plan->setId($id);
        $agreement->setPlan($plan);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
            $agreement->create($this->_api_context);

            return $agreement;
        }catch (Exception $ex) {
            exit(1);
        }
    }

    public function executeAgreement(Request $request)
    {
        if ($request->success == true) {

            $token = $_GET['token'];
            $agreement = new Agreement();

            try {

                $agreement->execute($token, $this->_api_context);
                $payment = Agreement::get($agreement->getId(), $this->_api_context);

                Session::put('paypal_payment_details', $payment);

                alert()->success('Plan activated successfully!');
//                return $agreement;
                return redirect()->route('user.plans');

            } catch (Exception $ex) {

                exit(1);

            }
        }else{

            alert()->error(trans("Payment failed, Something went wrong!"));

            return redirect()->route('user.plans');
        }

    }

    public function cancelWithPaypal($agreementId)
    {

//        return $agreementId;
        $agreementStateDescriptor = new AgreementStateDescriptor();
        $agreementStateDescriptor->setNote("cancel the subscription");

        /** @var Agreement $createdAgreement */
        $createdAgreement = Agreement::get($agreementId, $this->_api_context); // Replace this with your fetched agreement object

        $createdAgreement->cancel($agreementStateDescriptor, $this->_api_context);

        $agreement = Agreement::get($createdAgreement->getId(), $this->_api_context);

        $user = Auth::user();
        $user->update([
            'plan_id' => null,
            'plan_details' => null,
            'paypal_plan_id' => null,
            'plan_validity' => null,
            'paypal_data' => null,
            'plan_activation_date' => null

        ]);

        alert()->success('Plan has been cancelled successfully!');
        return redirect()->route('user.plans');
    }

//    public function paypalPaymentStatus(Request $request)
//    {
//        /** Get the payment ID before session clear **/
//        $payment_id = Session::get('paypal_payment_id');
//
//        $orderId = $payment_id;
//        $transaction_details = TransactionModel::where('transaction_id', $orderId)->where('status', 1)->first();
//        $user_details = User::find(Auth::user()->id);
//        $config = DB::table('config')->get();
//
//        /** clear the session payment ID **/
//        Session::forget('paypal_payment_id');
//        if (empty($request->PayerID) || empty($request->token)) {
//            TransactionModel::where('transaction_id', $orderId)->update([
//                'transaction_id' => $orderId,
//                'payment_status' => 'FAILED',
//            ]);
//
//            alert()->error(trans("Payment failed, Something went wrong!"));
//            return redirect()->route('user.plans');
//        }
//        $payment = Payment::get($payment_id, $this->_api_context);
//        $execution = new PaymentExecution();
//        $execution->setPayerId($request->PayerID);
//        /**Execute the payment **/
//        $result = $payment->execute($execution, $this->_api_context);
//
//        if ($result->getState() == 'approved') {
//
//            $plan_data = Plan::where('plan_id', $transaction_details->plan_id)->first();
//            $term_days = $plan_data->validity;
//
//
//            if ($user_details->plan_validity == "") {
//
//                $plan_validity = Carbon::now();
//                $plan_validity->addDays($term_days);
//
//                $invoice_count = TransactionModel::where("invoice_prefix", $config[15]->config_value)->count();
//                $invoice_number = $invoice_count + 1;
//
//                TransactionModel::where('transaction_id', $orderId)->update([
//                    'transaction_id' => $orderId,
//                    'invoice_prefix' => $config[15]->config_value,
//                    'invoice_number' => $invoice_number,
//                    'payment_status' => 'SUCCESS',
//                ]);
//
//                User::where('user_id', Auth::user()->user_id)->update([
//                    'plan_id' => $transaction_details->plan_id,
//                    'term' => $term_days,
//                    'plan_validity' => $plan_validity,
//                    'plan_activation_date' => now(),
//                    'plan_details' => $plan_data
//                ]);
//
//                $encode = json_decode($transaction_details['invoice_details'], true);
//                $details = [
//                    'from_billing_name' => $encode['from_billing_name'],
//                    'from_billing_email' => $encode['from_billing_email'],
//                    'from_billing_address' => $encode['from_billing_address'],
//                    'from_billing_city' => $encode['from_billing_city'],
//                    'from_billing_state' => $encode['from_billing_state'],
//                    'from_billing_country' => $encode['from_billing_country'],
//                    'from_billing_zipcode' => $encode['from_billing_zipcode'],
//                    'gobiz_transaction_id' => $transaction_details->gobiz_transaction_id,
//                    'to_billing_name' => $encode['to_billing_name'],
//                    'invoice_currency' => $transaction_details->transaction_currency,
//                    'subtotal' => $encode['subtotal'],
//                    'tax_amount' => $encode['tax_amount'],
//                    'invoice_amount' => $encode['invoice_amount'],
//                    'invoice_id' => $config[15]->config_value . $invoice_number,
//                    'invoice_date' => $transaction_details->created_at,
//                    'description' => $transaction_details->desciption,
//                    'email_heading' => $config[27]->config_value,
//                    'email_footer' => $config[28]->config_value,
//                ];
//
//                try {
//                    Mail::to($encode['to_billing_email'])->send(new SendEmailInvoice($details));
//                } catch (Exception $e) {
//
//                }
//
//                alert()->success(trans('Plan activation success!'));
//                return redirect()->route('user.plans');
//            } else {
//
//                $message = "";
//                if ($user_details->plan_id == $transaction_details->plan_id) {
//
//                    // Check if plan validity is expired or not.
//                    $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
//                    $current_date = Carbon::now();
//                    $remaining_days = $current_date->diffInDays($plan_validity, false);
//
//                    if ($remaining_days > 0) {
//                        $plan_validity = Carbon::parse($user_details->plan_validity);
//                        $plan_validity->addDays($term_days);
//                        $message = "Plan renewed successfully!";
//                    } else {
//                        $plan_validity = Carbon::now();
//                        $plan_validity->addDays($term_days);
//                        $message = "Plan renewed successfully!";
//                    }
//                } else {
//
//                    // Making all cards inactive, For Plan change
//                    BusinessCard::where('user_id', Auth::user()->user_id)->update([
//                        'card_status' => 'inactive',
//                    ]);
//
//                    $plan_validity = Carbon::now();
//                    $plan_validity->addDays($term_days);
//                    $message = "Plan activated successfully!";
//                }
//
//                $invoice_count = TransactionModel::where("invoice_prefix", $config[15]->config_value)->count();
//                $invoice_number = $invoice_count + 1;
//
//                TransactionModel::where('transaction_id', $orderId)->update([
//                    'transaction_id' => $orderId,
//                    'invoice_prefix' => $config[15]->config_value,
//                    'invoice_number' => $invoice_number,
//                    'payment_status' => 'SUCCESS',
//                ]);
//
//                User::where('user_id', Auth::user()->user_id)->update([
//                    'plan_id' => $transaction_details->plan_id,
//                    'term' => $term_days,
//                    'plan_validity' => $plan_validity,
//                    'plan_activation_date' => now(),
//                    'plan_details' => $plan_data
//                ]);
//
//                $encode = json_decode($transaction_details['invoice_details'], true);
//                $details = [
//                    'from_billing_name' => $encode['from_billing_name'],
//                    'from_billing_email' => $encode['from_billing_email'],
//                    'from_billing_address' => $encode['from_billing_address'],
//                    'from_billing_city' => $encode['from_billing_city'],
//                    'from_billing_state' => $encode['from_billing_state'],
//                    'from_billing_country' => $encode['from_billing_country'],
//                    'from_billing_zipcode' => $encode['from_billing_zipcode'],
//                    'gobiz_transaction_id' => $transaction_details->gobiz_transaction_id,
//                    'to_billing_name' => $encode['to_billing_name'],
//                    'invoice_currency' => $transaction_details->transaction_currency,
//                    'subtotal' => $encode['subtotal'],
//                    'tax_amount' => $encode['tax_amount'],
//                    'invoice_amount' => $encode['invoice_amount'],
//                    'invoice_id' => $config[15]->config_value . $invoice_number,
//                    'invoice_date' => $transaction_details->created_at,
//                    'description' => $transaction_details->desciption,
//                    'email_heading' => $config[27]->config_value,
//                    'email_footer' => $config[28]->config_value,
//                ];
//
//                try {
//                    Mail::to($encode['to_billing_email'])->send(new SendEmailInvoice($details));
//                } catch (Exception $e) {
//
//                }
//
//                alert()->success($message);
//                return redirect()->route('user.plans');
//            }
//        } else {
//            TransactionModel::where('transaction_id', $orderId)->update([
//                'transaction_id' => $orderId,
//                'payment_status' => 'FAILED',
//            ]);
//
//            alert()->error(trans("Payment failed, Something went wrong!"));
//            return redirect()->route('user.plans');
//        }
//    }
}
