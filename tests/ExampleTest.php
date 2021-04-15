<?php

namespace Bildvitta\Navpi\Tests;

use Orchestra\Testbench\TestCase;
use Bildvitta\Navpi\NavpiPhpServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [NavpiPhpServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
