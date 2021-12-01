<?php

namespace Revolution\LaminasForm\Concerns;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\HtmlString;
use Laminas\View\Renderer\RendererInterface;

trait Renderable
{
    /**
     * @return RendererInterface
     *
     * @throws BindingResolutionException
     */
    protected function getRenderer(): RendererInterface
    {
        return Container::getInstance()->make(RendererInterface::class);
    }

    /**
     * @param  string  $helper
     * @return HtmlString
     *
     * @throws BindingResolutionException
     * @throws \BadMethodCallException
     */
    public function render(string $helper): HtmlString
    {
        $renderer = $this->getRenderer();

        return new HtmlString($renderer->$helper($this));
    }

    /**
     * @param  string  $method
     * @param  array  $arguments
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
