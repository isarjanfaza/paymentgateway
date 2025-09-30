<?php

namespace NexaCore\Paymentgateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use NexaCore\Paymentgateway\Facades\NcPaymentGateway;

class PaystackPaymentController extends Controller
{
    public function redirect_to_gateway(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:50',
            'currency' => 'required|string|max:10',
            'reference' => 'nullable|string|max:190',
            'callback_url' => 'required|url',
        ]);

        config([
            'paystack.merchantEmail' => config('paymentgateway.paystack.merchant_email', config('paymentgateway.paystack.merchant_email')),
            'paystack.secretKey' => config('paymentgateway.paystack.secret_key'),
            'paystack.publicKey' => config('paymentgateway.paystack.public_key'),
            'paystack.paymentUrl' => config('paymentgateway.paystack.payment_url','https://api.paystack.co'),
        ]);

        try{
            $authorization = Paystack::getAuthorizationUrl();
            return $authorization->redirectNow();
        }catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function callback(Request $request)
    {
        try{
            $payment = Paystack::getPaymentData();
            return response()->json($payment);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
