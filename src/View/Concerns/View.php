<?php

namespace Revolution\LaminasForm\View\Concerns;

use Laminas\View\Renderer\RendererInterface as Renderer;
use Laminas\View\Helper\HelperInterface;

trait View
{
    /**
     * Set the View object
     *
     * @param  Renderer  $view
     * @return HelperInterface
     */
    public function setView(Renderer $view): HelperInterface
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the view object
     *
     * @return null|Renderer
     */
    public function getView(): ?Renderer
    {
        return $this->view;
    }
}
