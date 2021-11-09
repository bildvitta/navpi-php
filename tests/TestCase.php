<?php

namespace Bildvitta\Navpi\Tests;

use Bildvitta\Navpi\NavpiPhpServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [NavpiPhpServiceProvider::class];
    }
}
