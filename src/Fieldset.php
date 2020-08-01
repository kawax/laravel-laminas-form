<?php

namespace Revolution\LaminasForm;

use Illuminate\Support\HtmlString;
use Laminas\Form\Fieldset as LaminasFieldset;

class Fieldset extends LaminasFieldset
{
    use Concerns\Renderable {
        render as parentRender;
    }

    /**
     * @param  string  $helper
     *
     * @return HtmlString
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function render(string $helper = 'formCollection'): HtmlString
    {
        return $this->parentRender($helper);
    }
}
