<?php
namespace CoinbarPay\Sdk;

use Adamantic\CryptoPayments\PaymentGatewayBase;
use Adamantic\CryptoPayments\PaymentRequest;
use Adamantic\CryptoPayments\PaymentStatus;
use Adamantic\CryptoPayments\PaymentStatusUpdate;
use CoinbarPay\Sdk\CoinbarPaymentGatewayConfig as C;

/**
 * Implementation of the CoinbarPay payment gateway.
 */
class CoinbarPaymentGateway extends PaymentGatewayBase {

    private CoinbarPaymentGatewayConfig $config;

    public function __construct(CoinbarPaymentGatewayConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function requestPayment(PaymentRequest $request): PaymentStatusUpdate
    {
        $tok = PaymentRequestToken::from($request, $this->config);
        $c = $this->config;
        return (new PaymentStatusUpdate())
            ->setRequestId($request->getUuid())
            ->setStatus(PaymentStatus::REQUESTED)
            ->setFrontendRedirectUrl(
                $c->get(C::CBPAY_GW_URL)
                . "/paymentgateway/pay?requestToken=" . $tok->encode()
                . "&serviceClientId=" . $c->get(C::CBPAY_SERVICE_CLIENT_ID)
                . "&timestamp=" . $request->getTimestampMs()
            );

    }

}
