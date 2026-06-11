<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\ElementInterface;

trait Label
{
    protected function label(ElementInterface $element): string
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
