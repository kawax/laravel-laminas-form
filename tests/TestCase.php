<?php

namespace Revolution\LaminasForm\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Revolution\LaminasForm\Providers\LaminasFormServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaminasFormServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
        ];
    }
}
