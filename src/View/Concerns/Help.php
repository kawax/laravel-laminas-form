<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\Form\ElementInterface;

trait Help
{
    protected function helpText(ElementInterface $element): string
    {
        if (empty($element->getOption('help-text'))) {
            return '';
        }

        $html = self::DEFAULTS['help_open'];
        $html .= $element->getOption('help-text');
        $html .= self::DEFAULTS['help_close'];

        return $html;
    }
}
