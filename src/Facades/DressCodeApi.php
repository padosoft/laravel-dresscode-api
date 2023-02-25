<?php

namespace Padosoft\Laravel\DressCodeApi\Facades;

use Illuminate\Support\Facades\Facade;

class DressCodeApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'dress-code-api';
    }
}
