<?php

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\ElementInterface;

trait Row
{
    /**
     * @param  ElementInterface  $element
     * @return string
     */
    protected function row(ElementInterface $element): string
    {
        $html = '<div class="';
        $html .= $element->getOption('wrapper-class') ?? self::DEFAULTS['wrapper'];
        $html .= '">';

        $html .= $this->label($element);

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? self::DEFAULTS['element'];
        $html .= '">';

        $html .= $this->submit($element);

        $html .= $this->helpText($element);

        $html .= '</div></div>';

        return $html;
    }
}
