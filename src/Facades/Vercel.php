<?php

namespace Backpack\Pages\Facades;

use Illuminate\Support\Facades\Facade;

class Vercel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vercel';
    }
}
