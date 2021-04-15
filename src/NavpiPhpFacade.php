<?php

namespace Bildvitta\Navpi;

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
