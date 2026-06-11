<?php

declare(strict_types=1);

/**
 * Additional View Helpers.
 *
 * https://github.com/laminas/laminas-form/blob/master/src/ConfigProvider.php
 */

use Laminas\ServiceManager\Factory\InvokableFactory;
use Revolution\LaminasForm\View\Helper\Bootstrap4Horizon;
use Revolution\LaminasForm\View\Helper\Bootstrap5Horizon;
use Revolution\LaminasForm\View\Helper\Uikit3Horizon;

return [
    'aliases' => [
        'bootstrap4horizon' => Bootstrap4Horizon::class,
        'bootstrap5horizon' => Bootstrap5Horizon::class,
        'uikit3horizon' => Uikit3Horizon::class,
    ],
    'factories' => [
        Bootstrap4Horizon::class => InvokableFactory::class,
        Bootstrap5Horizon::class => InvokableFactory::class,
        Uikit3Horizon::class => InvokableFactory::class,
    ],
];
