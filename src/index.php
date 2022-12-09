<?php
require_once(__DIR__ . '/../vendor/autoload.php');
use Dotenv\Dotenv;
use CoinbarPay\Sdk\CoinbarPaymentGatewayEnvConfig;

Dotenv::createImmutable(__DIR__)->load();
$cfg = new CoinbarPaymentGatewayEnvConfig();
?>

<html>
    <body>
    Welcome, PHP version is <?= phpversion(); ?>
    </body>
</html>