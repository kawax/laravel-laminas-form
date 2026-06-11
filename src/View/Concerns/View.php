<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\View\Helper\HelperInterface;
use Laminas\View\Renderer\RendererInterface as Renderer;

trait View
{
    /**
     * Set the View object.
     */
    public function setView(Renderer $view): HelperInterface
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the view object.
     */
    public function getView(): ?Renderer
    {
        return $this->view;
    }
}
