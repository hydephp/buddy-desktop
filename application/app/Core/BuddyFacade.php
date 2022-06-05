<?php

namespace App\Core;

use App\Core\Contracts\Buddy;
use Illuminate\Support\Facades\Facade;

class BuddyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Buddy::class;
    }
}
