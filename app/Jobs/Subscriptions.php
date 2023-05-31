<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Agreement;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\AgreementStateDescriptor;
use Stripe\StripeClient;
use function Symfony\Component\Translation\t;

class Subscriptions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $agreementId;
    private $activePlanDetails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($agreementId, $activePlanDetails)
    {
        $this->agreementId = $agreementId;
        $this->activePlanDetails = $activePlanDetails;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->activePlanDetails) {
            $this->updateCurrentSubscriptions();
        } else {
            $this->cancelPreviousSubscriptions();
        }

    }

    public function updateCurrentSubscriptions()
    {
        $active_paypal_plan = json_decode($this->activePlanDetails->paypal_data);
        $active_stripe_plan = json_decode($this->activePlanDetails->stripe_data);
        $config = DB::table('config')->get();

        if($active_paypal_plan){
            $this->_api_context = new ApiContext(new OAuthTokenCredential($config[4]->config_value, $config[5]->config_value));
            $this->_api_context->setConfig(array(
                'mode' => $config[3]->config_value,
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'DEBUG',
            ));
            $paypalDetails = Agreement::get($active_paypal_plan->id, $this->_api_context);
//            dd($paypalDetails);

            if ($paypalDetails->state == 'Cancelled'){
                User::where('id', $this->activePlanDetails->id)->update([
                    'plan_id' => null,
                    'plan_details' => null,
                    'paypal_plan_id' => null,
                    'plan_validity' => null,
                    'paypal_data' => null,
                    'plan_activation_date' => null

                ]);
            }else {
                User::where('id', $this->activePlanDetails->id)->update(['paypal_data' => $paypalDetails]);
            }
        }

        if($active_stripe_plan) {
            $stripe = new StripeClient($config[10]->config_value);

            $stripe_details = $stripe->subscriptions->retrieve(
                $active_stripe_plan->id,
                []
            );

            if($stripe_details->status != 'active') {
                User::where('id', $this->activePlanDetails->id)->update([
                    'plan_id' => null,
                    'plan_details' => null,
                    'plan_validity' => null,
                    'stripe_data' => null,
                    'plan_activation_date' => null

                ]);
            }else {
                User::where('id', $this->activePlanDetails->id)->update(['stripe_data' => $stripe_details]);
            }
        }
    }

    public function cancelPreviousSubscriptions()
    {
        $paypal_configuration = DB::table('config')->get();

        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration[4]->config_value, $paypal_configuration[5]->config_value));
        $this->_api_context->setConfig(array(
            'mode' => $paypal_configuration[3]->config_value,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'DEBUG',
        ));

        //Create an Agreement State Descriptor, explaining the reason to suspend.
        $agreementStateDescriptor = new AgreementStateDescriptor();
        $agreementStateDescriptor->setNote("New plan has been active");


        /** @var Agreement $createdAgreement */
        $createdAgreement = Agreement::get($this->agreementId, $this->_api_context); // Replace this with your fetched agreement object
        if ($createdAgreement->state != "Cancelled"){
            $createdAgreement->cancel($agreementStateDescriptor, $this->_api_context);

        }
    }

}
