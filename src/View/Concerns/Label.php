<?php

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\ElementInterface;

trait Label
{
    /**
     * @param  ElementInterface  $element
     * @return string
     */
    protected function label(ElementInterface $element)
    {
        $label = $element->getLabel();
        $type = $element->getAttribute('type');

        if ($type === 'hidden') {
            return '';
        }

        if (empty($label)) {
            return '';
        } else {
            return $this->getView()->formLabel($element);
        }
    }
}
