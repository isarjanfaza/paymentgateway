<?php

namespace NexaCore\Paymentgateway\Http\Controllers;


use Illuminate\Http\Request;
use NexaCore\Paymentgateway\Facades\NcPaymentGateway;

class StripePaymentController extends Controller
{
    public function charge_customer(Request $request){
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.5',
            'charge_amount' => 'nullable|numeric|min:0',
            'title' => 'required|string|max:190',
            'description' => 'nullable|string|max:500',
            'ipn_url' => 'required|url',
            'order_id' => 'required|string|max:190',
            'track' => 'nullable|string|max:190',
            'cancel_url' => 'required|url',
            'success_url' => 'required|url',
            'email' => 'required|email',
            'name' => 'required|string|max:190',
            'payment_type' => 'required|string|max:100',
            'currency' => 'required|string|max:10',
        ]);

        try{
            $stripe_session = NcPaymentGateway::stripe()->charge_customer_from_controller([
                'amount' => $validated['amount'],
                'charge_amount' => $validated['charge_amount'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'ipn_url' => $validated['ipn_url'],
                'order_id' => $validated['order_id'],
                'track' => $validated['track'] ?? null,
                'cancel_url' => $validated['cancel_url'],
                'success_url' => $validated['success_url'],
                'email' => $validated['email'],
                'name' => $validated['name'],
                'payment_type' => $validated['payment_type'],
                'secret_key' => config('paymentgateway.stripe.secret_key'),
                'currency' => $validated['currency'],
            ]);
            return response()->json(['id' => $stripe_session['id']]);
        }catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage(),'type' => 'danger'],422);
        }
    }
}
