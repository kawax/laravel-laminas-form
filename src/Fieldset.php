<?php

declare(strict_types=1);

namespace Revolution\LaminasForm;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\HtmlString;
use Laminas\Form\Fieldset as LaminasFieldset;

class Fieldset extends LaminasFieldset
{
    use Concerns\Renderable {
        render as parentRender;
    }

    /**
     * @throws BindingResolutionException
     */
    public function render(string $helper = 'formCollection'): HtmlString
    {
        return $this->parentRender($helper);
    }
}
