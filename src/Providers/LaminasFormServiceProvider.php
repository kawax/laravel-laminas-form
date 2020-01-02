<?php

namespace Revolution\LaminasForm\Providers;

use Illuminate\Support\ServiceProvider;

use Laminas\View\Renderer\RendererInterface;
use Laminas\View\Renderer\PhpRenderer;
use Laminas\View\HelperPluginManager;
use Laminas\Form\ConfigProvider;
use Laminas\ServiceManager\ServiceManager;

use Revolution\LaminasForm\Commands;

class LaminasFormServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    Commands\FormMakeCommand::class,
                ]
            );
        }

        $this->publishes(
            [
                __DIR__.'/../config/laminas-form.php' => config_path('laminas-form.php'),
            ]
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laminas-form.php',
            'laminas-form'
        );

        $this->app->singleton(
            RendererInterface::class,
            function ($app) {
                $renderer = new PhpRenderer();
                $configProvider = new ConfigProvider();

                $config = array_merge_recursive(
                    $configProvider->getViewHelperConfig(),
                    $app['config']['laminas-form']
                );

                $pluginManager = new HelperPluginManager(new ServiceManager(), $config);

                $renderer->setHelperPluginManager($pluginManager);

                return $renderer;
            }
        );
    }
}
