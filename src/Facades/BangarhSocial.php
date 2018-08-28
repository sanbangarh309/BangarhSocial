<?php

namespace sandeep\BangarhSocial\Facades;

use Illuminate\Support\Facades\Facade;

class BangarhSocial extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bangarhsocial';
    }
}
