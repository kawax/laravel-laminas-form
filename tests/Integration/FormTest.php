<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\Tests\Integration;

use Laminas\View\Renderer\PhpRenderer;
use Laminas\View\Renderer\RendererInterface;
use Revolution\LaminasForm\Form;
use Revolution\LaminasForm\Tests\TestCase;

class FormTest extends TestCase
{
    public function test_instance(): void
    {
        $form = new Form;
        $this->assertInstanceOf(Form::class, $form);
    }

    public function test_render(): void
    {
        $form = new TestForm;

        $this->assertStringContainsString('<form', (string) $form->render());
    }

    public function test_open_tag(): void
    {
        $form = new TestForm;

        $this->assertStringContainsString('<form', $form->form()->openTag($form));
    }

    public function test_input(): void
    {
        $form = new TestForm;

        $this->assertStringContainsString('<input type="text" name="name"', $form->formInput($form->get('name')));
    }

    public function test_renderer(): void
    {
        $renderer = app(RendererInterface::class);

        $this->assertInstanceOf(PhpRenderer::class, $renderer);
    }

    public function test_helper_bs_horizon(): void
    {
        $form = new TestForm;

        $html = $form->bootstrap4horizon($form);

        // dump($html);

        $this->assertStringContainsString('form-text text-muted', $html);
    }

    public function test_helper_ui_horizon(): void
    {
        $form = new TestForm;

        $html = $form->uikit3horizon($form);

        // dump($html);

        $this->assertStringContainsString('uk-text-meta', $html);
    }

    public function test_form_render_with_helper(): void
    {
        $form = new TestForm;

        $html = (string) $form->render('bootstrap4horizon');

        // dump($html);

        $this->assertStringContainsString('form-text text-muted', $html);
    }
}
