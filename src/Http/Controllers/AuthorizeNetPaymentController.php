<?php

namespace NexaCore\Paymentgateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NexaCore\Paymentgateway\Facades\NcPaymentGateway;

class AuthorizeNetPaymentController extends Controller
{
    public function charge_customer(Request $request){
       $validated = $request->validate([
           'ipn_url' => 'required|url',
           'order_id' => 'required|string|max:190',
           'payment_type' => 'required|string|max:100',
       ]);

       $payment_data =  NcPaymentGateway::authorizenet()->charge_customer_from_controller();
       $transaction_id = $payment_data['transaction_id'] ?? "";
       Session::put('authorizenet_last_transaction_id',$transaction_id);

       $ipnUrl = $validated['ipn_url'];
       $parsed = parse_url($ipnUrl);
       if (!isset($parsed['host'])) {
           return response()->json(['message' => 'Invalid IPN URL'], 422);
       }

       $query = http_build_query([
           'transaction_id' => $transaction_id,
           'order_id' => $validated['order_id'],
           'order_type' => $validated['payment_type'],
           'status' => $payment_data['status'] ?? 'failed',
       ]);

       return redirect($ipnUrl.(str_contains($ipnUrl,'?') ? '&' : '?').$query);
    }
}
