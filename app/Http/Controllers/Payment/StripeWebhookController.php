<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StripeWebhookController extends Controller
{


    public function webhook()
    {
        $config = DB::table('config')->get();
        //    \Stripe\Stripe::setApiKey('sk_test_51L5UFzIY8R27Jx6M9JghugsndjalSWLKBdGr6lvAu08ladRJG0jRDJ7CTic0IRxUDKpCibBaOhUOHR97OYrOYqa900z3vy6iU9');
        // Replace this endpoint secret with your endpoint's unique secret
        // If you are testing with the CLI, find the secret by running 'stripe listen'
        // If you are using an endpoint defined with the API or dashboard, look in your webhook settings
        // at https://dashboard.stripe.com/webhooks
        $endpoint_secret = $config[32]->config_value;

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            echo '⚠️  Webhook error while parsing basic request.';
            http_response_code(400);
            exit();
        }

        if ($endpoint_secret) {
            // Only verify the event if there is an endpoint secret defined
            // Otherwise use the basic decoded event
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload, $sig_header, $endpoint_secret
                );
            } catch(\Stripe\Exception\SignatureVerificationException $e) {
                // Invalid signature
                echo '⚠️  Webhook error while validating signature.';
                http_response_code(400);
                exit();
            }
        }

        switch ($event->type) {
            case 'customer.subscription.created':
                $subscription = $event->data->object;
                return response()->json(['data' => $subscription, 'message'=>'Successfully subscription created', http_response_code(201)]);
            case 'customer.subscription.updated':
                $subscription = $event->data->object;
                return response()->json(['data' => Session::get('user'), 'message'=>'Successfully subscription updated', http_response_code(201)]);
            case 'invoice.created':
                $invoice = $event->data->object;
                return response()->json(['data' => $invoice, 'message'=>'Successfully invoice created', http_response_code(201)]);
            case 'invoice.finalized':
                $invoice = $event->data->object;
                return response()->json(['data' => $invoice, 'message'=>'Successfully invoice finalized', http_response_code(201)]);
            case 'invoice.payment_succeeded':
                $invoice = $event->data->object;
                return response()->json(['data' => $invoice, 'message'=>'Successfully invoice payment succeeded', http_response_code(201)]);
            case 'invoice.updated':
                $invoice = $event->data->object;
                return response()->json(['data' => $invoice, 'message'=>'Successfully invoice updated', http_response_code(201)]);

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }
}
