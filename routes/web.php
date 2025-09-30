<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| paymentgateway Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your package.
|
*/

/* ----------------------------------------
    STRIPE ROUTE
---------------------------------------- */
Route::group(['middleware' => 'web'],function (){
    /**
     *  STRIPE PAYMENT ROUTE
     * */
    Route::post('ncpayment-gateway/powertransz',[\NexaCore\Paymentgateway\Http\Controllers\PowertranszPaymentController::class,'charge_customer'])
        ->name('nc.payment.gateway.powertransz');
    Route::post('ncpayment-gateway/authorizenet',[\NexaCore\Paymentgateway\Http\Controllers\AuthorizeNetPaymentController::class,'charge_customer'])
        ->name('nc.payment.gateway.authorizenet');
    Route::post('ncpayment-gateway/stripe',[\NexaCore\Paymentgateway\Http\Controllers\StripePaymentController::class,'charge_customer'])
        ->name('nc.payment.gateway.stripe');
    Route::post('ncpayment-gateway/paystack',[\NexaCore\Paymentgateway\Http\Controllers\PaystackPaymentController::class,'redirect_to_gateway'])
        ->name('nc.payment.gateway.paystack');
    Route::get('ncpayment-gateway/paystack-callback',[\NexaCore\Paymentgateway\Http\Controllers\PaystackPaymentController::class,'callback'])
        ->name('nc.payment.gateway.paystack.callback');
});

