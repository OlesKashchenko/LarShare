<?php

namespace OlesKashchenko\LarShare\Facades;

use Illuminate\Support\Facades\Facade;


class LarShare extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lar_share';
    } // end getFacadeAccessor
}