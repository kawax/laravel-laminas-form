<?php


namespace Revolution\LaminasForm;


use Illuminate\Support\HtmlString;
use Laminas\Form\Fieldset as LaminasFieldset;

class Fieldset extends LaminasFieldset
{
    use RenderableTrait {
        render as parentTrait;
    }

    public function render(string $helper = 'formCollection'): HtmlString
    {
        return $this->parentTrait($helper);
    }
}