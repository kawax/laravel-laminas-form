<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\Concerns;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\HtmlString;
use Laminas\View\Renderer\RendererInterface;

trait Renderable
{
    /**
     * @throws BindingResolutionException
     */
    protected function getRenderer(): RendererInterface
    {
        return Container::getInstance()->make(RendererInterface::class);
    }

    /**
     * @throws BindingResolutionException
     * @throws \BadMethodCallException
     */
    public function render(string $helper): HtmlString
    {
        $renderer = $this->getRenderer();

        return new HtmlString($renderer->$helper($this));
    }

    /**
     * @return mixed
     *
     * @throws BindingResolutionException
     * @throws \BadMethodCallException
     */
    public function __call(string $method, array $arguments = [])
    {
        $renderer = $this->getRenderer();

        return call_user_func_array([$renderer, $method], array_values($arguments));
    }
}
