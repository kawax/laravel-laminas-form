<?php


namespace Revolution\LaminasForm;


use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\HtmlString;

use Laminas\Form\Fieldset as LaminasFieldset;
use Laminas\View\Renderer\RendererInterface;

class Fieldset extends LaminasFieldset
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
     * @param string $helper
     *
     * @return HtmlString
     *
     * @throws BindingResolutionException
     * @throws \BadMethodCallException
     */
    public function render(string $helper = 'formCollection'): HtmlString
    {
        $renderer = $this->getRenderer();

        if (is_callable([$renderer, $helper])) {
            return new HtmlString($renderer->$helper($this));
        }

        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $helper));
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws BindingResolutionException
     * @throws \BadMethodCallException
     */
    public function __call($method, $arguments)
    {
        $renderer = $this->getRenderer();

        if (is_callable([$renderer, $method])) {
            return call_user_func_array([$renderer, $method], $arguments);
        }

        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $method));
    }
}