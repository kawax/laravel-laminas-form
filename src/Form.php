<?php

namespace Revolution\LaminasForm;

use Illuminate\Support\HtmlString;
use Laminas\Form\Form as LaminasForm;

class Form extends LaminasForm
{
    use RenderableTrait {
        render as parentTrait;
    }

    public function render(string $helper = 'form'): HtmlString
    {
        return $this->parentTrait($helper);
    }
}
