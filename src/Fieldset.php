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
     */
    public function render(string $helper = 'formCollection'): HtmlString
    {
        $renderer = $this->getRenderer();

        return new HtmlString($renderer->$helper($this));
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws BindingResolutionException
     */
    public function __call($method, $arguments)
    {
        $renderer = $this->getRenderer();
        return call_user_func_array([$renderer, $method], $arguments);
    }
}