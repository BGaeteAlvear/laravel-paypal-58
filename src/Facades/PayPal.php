<?php

namespace BGaeteAlvear\PayPal\Facades;

/*
 * Class Facade
 * @package BGaeteAlvear\PayPal\Facades
 * @see BGaeteAlvear\PayPal\ExpressCheckout
 */

use Illuminate\Support\Facades\Facade;

class PayPal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BGaeteAlvear\PayPal\PayPalFacadeAccessor';
    }
}
