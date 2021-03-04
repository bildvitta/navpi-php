<?php

namespace Bildvitta\NavpiPhp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bildvitta\NavpiPhp\Skeleton\SkeletonClass
 */
class NavpiPhpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'navpi-php';
    }
}
