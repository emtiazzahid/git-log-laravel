<?php

namespace EmtiazZahid\GitLogLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class GitLogFacade
 * @package EmtiazZahid\GitLogLaravel
 */

class GitLogFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GitLogLaravel';
    }
}