<?php

namespace common\components;


use Midtrans\Config;
use Midtrans\Snap;

class Midtrans
{
    public static function setupConfig()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-2qghlkw8gh35wmWdaFIVDfGQ';
        // Set to Development/Sandbox Environment (true) or Production Environment (false)
        Config::$isProduction = false;
        // Set sanitization on (true)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public static function getSnapToken($params)
    {
        self::setupConfig();
        $snapToken = Snap::getSnapToken($params);
        return $snapToken;
    }
}
