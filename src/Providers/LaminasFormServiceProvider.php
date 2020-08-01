<?php

namespace Revolution\LaminasForm\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Laminas\Form\ConfigProvider;
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\HelperPluginManager;
use Laminas\View\Renderer\PhpRenderer;
use Laminas\View\Renderer\RendererInterface;
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
                __DIR__.'/../../config/laminas-form.php' => config_path('laminas-form.php'),
            ],
            'laminas-form-config'
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
            __DIR__.'/../../config/laminas-form.php',
            'laminas-form'
        );

        $this->app->singleton(
            PhpRenderer::class,
            PhpRenderer::class
        );

        $this->app->singleton(
            ConfigProvider::class,
            ConfigProvider::class
        );

        $this->app->singleton(
            RendererInterface::class,
            function (Application $app) {
                $renderer = $app->get(PhpRenderer::class);
                $configProvider = $app->get(ConfigProvider::class);

                $config = array_replace_recursive(
                    $configProvider->getViewHelperConfig(),
                    $app['config']['laminas-form']
                );

                $pluginManager = new HelperPluginManager(
                    new ServiceManager($app['config']['serviceManager'] ?? []),
                    $config
                );

                $renderer->setHelperPluginManager($pluginManager);

                return $renderer;
            }
        );
    }
}
