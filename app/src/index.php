<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use CoinbarPay\Sdk\CoinbarPaymentGatewayEnvConfig;

$cfg = new CoinbarPaymentGatewayEnvConfig();
?>

<html>
    <body>
    Welcome, PHP version is <?= phpversion(); ?>
    </body>
</html>