<?php

namespace Revolution\LaminasForm;

use Illuminate\Support\HtmlString;
use Laminas\Form\Form as LaminasForm;

class Form extends LaminasForm
{
    use Concerns\Renderable {
        render as parentRender;
    }

    /**
     * @param  string  $helper
     * @return HtmlString
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function render(string $helper = 'form'): HtmlString
    {
        return $this->parentRender($helper);
    }
}
