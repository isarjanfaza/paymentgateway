<?php

namespace NexaCore\Paymentgateway\Base;

use NexaCore\Paymentgateway\Base\Gateways\AuthorizeDotNetPay;
use NexaCore\Paymentgateway\Base\Gateways\AwdPay;
use NexaCore\Paymentgateway\Base\Gateways\BillPlzPay;
use NexaCore\Paymentgateway\Base\Gateways\CashFreePay;
use NexaCore\Paymentgateway\Base\Gateways\CinetPay;
use NexaCore\Paymentgateway\Base\Gateways\CoinPayment;
use NexaCore\Paymentgateway\Base\Gateways\FlutterwavePay;
use NexaCore\Paymentgateway\Base\Gateways\InstamojoPay;
use NexaCore\Paymentgateway\Base\Gateways\Iyzipay;
use NexaCore\Paymentgateway\Base\Gateways\KineticPay;
use NexaCore\Paymentgateway\Base\Gateways\MidtransPay;
use NexaCore\Paymentgateway\Base\Gateways\MolliePay;
use NexaCore\Paymentgateway\Base\Gateways\PagaliPay;
use NexaCore\Paymentgateway\Base\Gateways\PayFastPay;
use NexaCore\Paymentgateway\Base\Gateways\PaymobPay;
use NexaCore\Paymentgateway\Base\Gateways\PaypalPay;
use NexaCore\Paymentgateway\Base\Gateways\PaystackPay;
use NexaCore\Paymentgateway\Base\Gateways\PayTabsPay;
use NexaCore\Paymentgateway\Base\Gateways\PaytmPay;
use NexaCore\Paymentgateway\Base\Gateways\PayUmoneyPay;
use NexaCore\Paymentgateway\Base\Gateways\PowertranzPay;
use NexaCore\Paymentgateway\Base\Gateways\RazorPay;
use NexaCore\Paymentgateway\Base\Gateways\SaltPay;
use NexaCore\Paymentgateway\Base\Gateways\Senangpay;
use NexaCore\Paymentgateway\Base\Gateways\SitesWayPay;
use NexaCore\Paymentgateway\Base\Gateways\SquarePay;
use NexaCore\Paymentgateway\Base\Gateways\Sslcommerz;
use NexaCore\Paymentgateway\Base\Gateways\StripePay;
use NexaCore\Paymentgateway\Base\Gateways\MercadoPagoPay;
use NexaCore\Paymentgateway\Base\Gateways\Toyyibpay;
use NexaCore\Paymentgateway\Base\Gateways\TransactionCloudPay;
use NexaCore\Paymentgateway\Base\Gateways\WiPay;
use NexaCore\Paymentgateway\Base\Gateways\XenditPay;
use NexaCore\Paymentgateway\Base\Gateways\YooMoneyPay;
use NexaCore\Paymentgateway\Base\Gateways\ZitoPay;
use NexaCore\Paymentgateway\Base\Gateways\ZarinpalPay;

/**
 * @see SquarePay
 * @method  setApplicationId();
 * @method  setAccessToken();
 * @method  setLocationId();
 */

class PaymentGatewayHelpers
{

    public function stripe() : StripePay
    {
        return new StripePay();
    }
    public function paypal() : PaypalPay
    {
        return new PaypalPay();
    }
    public function midtrans() : MidtransPay
    {
        return new MidtransPay();
    }
    public function paytm() : PaytmPay
    {
        return new PaytmPay();
    }
    public function razorpay() : RazorPay
    {
        return new RazorPay();
    }
    public function mollie() : MolliePay
    {
        return new MolliePay();
    }
    public function flutterwave() : FlutterwavePay
    {
        return new FlutterwavePay();
    }
    public function paystack() : PaystackPay
    {
        return new PaystackPay();
    }

    public function payfast() : PayFastPay
    {
        return new PayFastPay();
    }
    public function cashfree() : CashFreePay
    {
        return new CashFreePay();
    }
    public function instamojo() : InstamojoPay
    {
        return new InstamojoPay();
    }
    // deprecated
    public function mercadopago() : MercadoPagoPay
    {
        return new MercadoPagoPay();
    }
    public function payumoney() : PayUmoneyPay
    {
        return new PayUmoneyPay();
    }
    public function squareup() : SquarePay
    {
        return new SquarePay();
    }
    public function cinetpay() : CinetPay
    {
        return new CinetPay();
    }
    public function paytabs() : PayTabsPay
    {
        return new PayTabsPay();
    }
    public function billplz() : BillPlzPay
    {
        return new BillPlzPay();
    }

    public function zitopay() : ZitoPay
    {
        return new ZitoPay();
    }
    public function toyyibpay() : Toyyibpay
    {
        return new Toyyibpay();
    }
    public function pagalipay() : PagaliPay
    {
        return new PagaliPay();
    }
    public function authorizenet() : AuthorizeDotNetPay
    {
        return new AuthorizeDotNetPay();
    }
    public function sitesway() : SitesWayPay
    {
        return new SitesWayPay();
    }
    public function wipay() : WiPay
    {
        return new WiPay();
    }
    public function kineticpay() : KineticPay
    {
        return new KineticPay();
    }
    // keep legacy name for backward compatibility
    public function transactionclud() : TransactionCloudPay
    {
        return new TransactionCloudPay();
    }
    // preferred name
    public function transactioncloud() : TransactionCloudPay
    {
        return new TransactionCloudPay();
    }

    public function senangpay() : Senangpay
    {
        return new Senangpay();
    }
    public function saltpay() : SaltPay
    {
        return new SaltPay();
    }

    public function paymob() : PaymobPay
    {
        return new PaymobPay();
    }

    public function iyzipay() : Iyzipay
    {
        return new Iyzipay();
    }

    public function powertranz() : PowertranzPay
    {
        return new PowertranzPay();
    }
    // keep legacy camel-case method for backward compatibility
    public function awdPay() : AwdPay
    {
        return new AwdPay();
    }    

    public function yoomoney() : YooMoneyPay
    {
        return new YooMoneyPay();
    }

    public function coinpayments() : CoinPayment
    {
        return new CoinPayment();
    }
    public function sslcommerz() : Sslcommerz
    {
        return new Sslcommerz();
    }
    public function xendit() : XenditPay
    {
        return new XenditPay();
    }

    public function zarinpal() : ZarinpalPay
    {
        return new ZarinpalPay();
    }

    public function all_payment_gateway_list() : array
    {
        return [
            'zitopay','billplz','paytabs','cinetpay','squareup',
            'mercadopago','instamojo','cashfree','payfast',
            'paystack','flutterwave','mollie','razorpay','paytm',
            'midtrans','paypal','stripe','toyyibpay','pagali','authorizenet',
            'sitesway','transactionclud','transactioncloud','wipay','kineticpay','senangpay','saltpay','paymob',
            'iyzipay','powertranz','awdPay','awdpay','yoomoney','coinpayments','sslcommerz','xendit','zarinpal'
//            'payumoney',
        ];
    }
    public function script_currency_list(){
        return GlobalCurrency::script_currency_list();
    }

    public static function wrapped_id($id) : string
    {
        return random_int(11111,99999).$id.random_int(11111,99999);
    }
    public static function unwrapped_id($id) : string
    {
        return substr($id,5,-5);
    }
    // Removed unsafe method that leaked server paths
}
