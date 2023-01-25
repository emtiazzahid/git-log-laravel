<?php

namespace Emtiazzahid\GitLogLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Emtiazzahid\GitLogLaravel\Skeleton\SkeletonClass
 */
class GitLogLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'git-log-laravel';
    }
}