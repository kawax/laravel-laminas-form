<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\ElementInterface;

trait Submit
{
    protected function submit(ElementInterface $element): string
    {
        if ($element->getAttribute('type') !== 'submit') {
            return $this->getView()->formElement($element);
        }

        $html = '<button type="submit" class="';
        $html .= $element->getAttribute('class') ?? self::DEFAULTS['submit'];
        $html .= '">';
        $html .= $element->getValue() ?? 'Submit';
        $html .= '</button>';

        return $html;
    }
}
