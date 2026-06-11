<?php

declare(strict_types=1);

namespace Revolution\LaminasForm;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\HtmlString;
use Laminas\Form\Form as LaminasForm;

class Form extends LaminasForm
{
    use Concerns\Renderable {
        render as parentRender;
    }

    /**
     * @throws BindingResolutionException
     */
    public function render(string $helper = 'form'): HtmlString
    {
        return $this->parentRender($helper);
    }
}
