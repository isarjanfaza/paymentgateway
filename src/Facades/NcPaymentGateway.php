<?php

namespace NexaCore\Paymentgateway\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * @method static array script_currency_list()
 * @method static mixed stripe()
 * @method static mixed paypal()
 * @method static mixed midtrans()
 * @method static mixed paytm()
 * @method static mixed razorpay()
 * @method static mixed mollie()
 * @method static mixed flutterwave()
 * @method static mixed paystack()
 * @method static mixed payfast()
 * @method static mixed cashfree()
 * @method static mixed instamojo()
 * @method static mixed mercadopago()
 * @method static mixed payumoney()
 * @method static mixed squareup()
 * @method static mixed cinetpay()
 * @method static mixed paytabs()
 * @method static mixed zitopay()
 * @method static mixed toyyibpay()
 * @method static mixed pagalipay()
 * @method static mixed authorizenet()
 * @method static mixed sitesway()
 * @method static mixed transactioncloud()
 * @method static mixed wipay()
 * @method static mixed kineticpay()
 * @method static mixed senangpay()
 * @method static mixed saltpay()
 * @method static mixed paymob()
 * @method static mixed iyzipay()
 * @method static mixed powertranz()
 * @method static mixed awdpay()
 * @method static mixed yoomoney()
 * @method static mixed coinpayments()
 * @method static mixed zarinpal()
 * @method static mixed xendit()
 * @method static mixed sslcommerz()
 */
class NcPaymentGateway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'NcPaymentGateway';
    }
}
