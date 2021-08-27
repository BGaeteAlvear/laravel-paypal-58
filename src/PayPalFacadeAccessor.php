<?php

namespace BGaeteAlvear\PayPal;

use Exception;
use BGaeteAlvear\PayPal\Services\PayPal as PayPalClient;

class PayPalFacadeAccessor
{
    /**
     * PayPal API provider object.
     *
     * @var
     */
    public static $provider;

    /**
     * Get specific PayPal API provider object to use.
     *
     * @throws Exception
     *
     * @return \BGaeteAlvear\PayPal\Services\PayPal
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * Set PayPal API Client to use.
     *
     * @throws \Exception
     *
     * @return \BGaeteAlvear\PayPal\Services\PayPal
     */
    public static function setProvider()
    {
        // Set default provider. Defaults to ExpressCheckout
        self::$provider = new PayPalClient();

        return self::getProvider();
    }
}
