<?php
namespace CoinbarPay\Sdk;

use CoinbarPay\Sdk\CoinbarPaymentGatewayConfig as Config;

/**
 * Utility class for encoding/decoding data according
 * to the CoinbarPay gateway specification
 */
class CoinbarCypher {

    const CYPHER_ALGO = 'AES-256-CBC';
    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function encode(string $data): string {
        return base64_encode(
            openssl_encrypt(
                $data,
                self::CYPHER_ALGO,
                $this->config->get(Config::CBPAY_TOKEN_API_KEY),
                0,
                $this->config->get(Config::CBPAY_TOKEN_SECRET_KEY)
            )
        );
    }


    public function decode(string $data): string {
        return openssl_decrypt(
            base64_decode($data),
            self::CYPHER_ALGO,
            $this->config->get(Config::CBPAY_TOKEN_API_KEY),
            0,
            $this->config->get(Config::CBPAY_TOKEN_SECRET_KEY)
        );
    }

}