<?php

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\FieldsetInterface;
use Laminas\Form\FormInterface;

trait Render
{
    /**
     * Render a form from the provided $form,.
     *
     * @param FormInterface $form
     *
     * @return string
     */
    public function render(FormInterface $form): string
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $formContent = '';

        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                /**
                 * @todo
                 * not best way to override this method.
                 * Normal service container functionality is broken through the override
                 * better would be to replace bindings inside the service container through the config,
                 * so normal di functionality would work fine.
                 */
                $formContent .= $this->getView()->formCollection($element);
            } else {
                $formContent .= $this->row($element);
            }
        }

        return $this->openTag($form).$formContent.$this->closeTag();
    }
}
