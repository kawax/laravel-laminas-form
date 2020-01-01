<?php

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\FieldsetInterface;
use Laminas\Form\FormInterface;

trait Render
{
    /**
     * Render a form from the provided $form,
     *
     * @param  FormInterface  $form
     *
     * @return string
     */
    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $formContent = '';

        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                //TODO?
                $formContent .= $this->getView()->formCollection($element);
            } else {
                $formContent .= $this->row($element);
            }
        }

        return $this->openTag($form).$formContent.$this->closeTag();
    }
}
