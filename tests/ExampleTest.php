<?php

namespace Bildvitta\NavpiPhp\Tests;

use Orchestra\Testbench\TestCase;
use Bildvitta\NavpiPhp\NavpiPhpServiceProvider;

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
