<?php
namespace CoinbarPay\Sdk;

use Adamantic\CryptoPayments\PaymentGateway;
use Adamantic\CryptoPayments\PaymentGatewayConfig;

/**
 * Abstract class delegating configuration to subclasses and templatizing construction
 * of a Coinbar Payment gateway
 */
abstract class CoinbarPaymentGatewayConfig extends PaymentGatewayConfig {

    const CBPAY_GW_URL = 'CBPAY_GW_URL';
    const CBPAY_SERVICE_CLIENT_ID = 'CBPAY_SERVICE_CLIENT_ID';
    const CBPAY_BACKEND_CALLBACK_URL = 'CBPAY_BACKEND_CALLBACK_URL';
    const CBPAY_FRONTEND_CALLBACK_URL = 'CBPAY_FRONTEND_CALLBACK_URL';
    const CBPAY_TOKEN_API_KEY = 'CBPAY_TOKEN_API_KEY';
    const CBPAY_TOKEN_SECRET_KEY = 'CBPAY_TOKEN_SECRET_KEY';

    public function createGateway(): PaymentGateway {
        $this->loadConfig();
        return new CoinbarPaymentGateway($this);
    }

    abstract function loadConfig();

}
