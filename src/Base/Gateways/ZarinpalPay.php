<?php

namespace NexaCore\Paymentgateway\Base\Gateways;

use NexaCore\Paymentgateway\Base\PaymentGatewayBase;
use NexaCore\Paymentgateway\Traits\CurrencySupport;
use NexaCore\Paymentgateway\Traits\PaymentEnvironment;
use ZarinPal\Sdk\Endpoint\PaymentGateway\RequestTypes\RequestRequest;
use ZarinPal\Sdk\Endpoint\PaymentGateway\RequestTypes\VerifyRequest;
use ZarinPal\Sdk\Options;
use ZarinPal\Sdk\ZarinPal;

class ZarinpalPay extends PaymentGatewayBase
{
    use PaymentEnvironment, CurrencySupport;

    protected $merchant_id;
    protected $mobile;
    protected $email;

    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }
    private function getMerchantId()
    {
        return $this->merchant_id ?? config('paymentgateway.zarinpal.merchant_id');
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function charge_amount($amount)
    {
        return (int)$amount;
    }

    public function ipn_response(array $args)
    {
        $authority = request()->get('Authority');
        $status = request()->get('Status');
        $order_id = $args['order_id'] ?? null;

        if ($status !== 'OK' || empty($authority)) {
            return ['status' => 'failed', 'order_id' => $order_id];
        }

        $options = new Options([
            'merchant_id' => $this->getMerchantId(),
            'sandbox' => (bool)$this->getEnv(),
        ]);
        $sdk = new ZarinPal($options);
        $gateway = $sdk->paymentGateway();

        $verify = new VerifyRequest();
        $verify->merchantId = $this->getMerchantId();
        $verify->amount = (int)($args['amount'] ?? 0);
        $verify->authority = $authority;

        $resp = $gateway->verify($verify);
        $refId = method_exists($resp, 'getRefId') ? $resp->getRefId() : ($resp->refId ?? null);

        if (!empty($refId)) {
            return $this->verified_data([
                'transaction_id' => $refId,
                'order_id' => $order_id
            ]);
        }

        return ['status' => 'failed', 'order_id' => $order_id];
    }

    public function charge_customer(array $args)
    {
        $amount = (int)$args['amount'];
        $callback = $args['ipn_url'];

        $options = new Options([
            'merchant_id' => $this->getMerchantId(),
            'sandbox' => (bool)$this->getEnv(),
        ]);
        $sdk = new ZarinPal($options);
        $gateway = $sdk->paymentGateway();

        $request = new RequestRequest();
        $request->merchantId = $this->getMerchantId();
        $request->amount = $amount;
        $request->callback_url = $callback;
        $request->description = $args['description'] ?? ($args['title'] ?? 'Order Payment');
        $request->mobile = $this->mobile ?? ($args['mobile'] ?? null);
        $request->email = $this->email ?? ($args['email'] ?? null);
        $request->currency = 'IRR';

        $response = $gateway->request($request);
        $authority = method_exists($response, 'getAuthority') ? $response->getAuthority() : ($response->authority ?? null);

        $redirectUrl = $gateway->getRedirectUrl($authority);

        return view('paymentgateway::zarinpal', [
            'redirect_url' => $redirectUrl,
        ]);
    }

    public function supported_currency_list()
    {
        return ['IRR', 'IRT'];
    }

    public function charge_currency()
    {
        return 'IRR';
    }

    public function gateway_name()
    {
        return 'zarinpal';
    }
}


