<?php

namespace NexaCore\Paymentgateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;
use NexaCore\Paymentgateway\Facades\NcPaymentGateway;

class PowertranszPaymentController extends Controller
{
    public function charge_customer(Request $request){
       $payment_data =  NcPaymentGateway::powertranz()->charge_customer_from_controller();
       return $payment_data;
    }
}
