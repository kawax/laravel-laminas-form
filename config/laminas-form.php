<?php
/**
 * Additional View Helpers.
 *
 * https://github.com/laminas/laminas-form/blob/master/src/ConfigProvider.php
 */

use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'aliases' => [
        'bootstrap4horizon' => Revolution\LaminasForm\View\Helper\Bootstrap4Horizon::class,
        'bootstrap5horizon' => Revolution\LaminasForm\View\Helper\Bootstrap5Horizon::class,
        'uikit3horizon' => Revolution\LaminasForm\View\Helper\Uikit3Horizon::class,
    ],
    'factories' => [
        Revolution\LaminasForm\View\Helper\Bootstrap4Horizon::class => InvokableFactory::class,
        Revolution\LaminasForm\View\Helper\Bootstrap5Horizon::class => InvokableFactory::class,
        Revolution\LaminasForm\View\Helper\Uikit3Horizon::class => InvokableFactory::class,
    ],
];
