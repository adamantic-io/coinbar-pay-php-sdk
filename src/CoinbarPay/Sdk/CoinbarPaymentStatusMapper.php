<?php

namespace CoinbarPay\Sdk;

use Adamantic\CryptoPayments\Exceptions\UnknownStatusException;
use Adamantic\CryptoPayments\PaymentStatus;

/**
 * Performs mapping between the SDK statuses and the CoinbarPay ones
 * @see PaymentStatus for the SDK statuses
 */
abstract class CoinbarPaymentStatusMapper
{

    private static array $CB_TO_SDK = [
        "Created"  => PaymentStatus::REQUESTED,
        "Pending"  => PaymentStatus::AUTHORIZED,
        "Success"  => PaymentStatus::COMPLETED,
        "Failed"   => PaymentStatus::REFUSED,
        "Canceled" => PaymentStatus::REVOKED,
    ];

    private static array $SDK_TO_CB = [
        PaymentStatus::REQUESTED  => "Created",
        PaymentStatus::AUTHORIZED => "Pending",
        PaymentStatus::COMPLETED  => "Success",
        PaymentStatus::REFUSED    => "Failed",
        PaymentStatus::REVOKED    => "Canceled"
    ];


    /**
     * Returns the SDK status corresponding to the CoinbarPay status
     * @throws UnknownStatusException if the provided status is not known to the system
     */
    public static function coinbarToSdk(string $cbStatus): string {
        if (!isset(self::$CB_TO_SDK[$cbStatus])) {
            throw new UnknownStatusException($cbStatus);
        }
        return self::$CB_TO_SDK[$cbStatus];
    }

    /**
     * Returns the CoinbarPay status corresponding to the SDK status
     * @throws UnknownStatusException if the provided status is not known to the system
     */
    public static function sdkToCoinbar(string $sdkStatus): string {
        if (!isset(self::$SDK_TO_CB[$sdkStatus])) {
            throw new UnknownStatusException($sdkStatus);
        }
        return self::$SDK_TO_CB[$sdkStatus];
    }

}
