<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\Tests\Unit;

use Illuminate\Contracts\Container\BindingResolutionException;
use Laminas\Form\Element\Text;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use PHPUnit\Framework\Attributes\TestWith;
use Revolution\LaminasForm\Fieldset;
use Revolution\LaminasForm\Form;
use Revolution\LaminasForm\Tests\TestCase;

class FormTest extends TestCase
{
    protected Form $form;

    protected function setUp(): void
    {
        parent::setUp();
        $this->form = new Form;
    }

    public function test_render_with_elements_works_correct(): void
    {
        $textElement = new Text('text');
        $this->form->add($textElement);

        $output = $this->form->render();
        $this->assertEquals(
            '<form action="" method="POST"><input type="text" name="text" value=""></form>',
            $output->toHtml()
        );
    }

    public function test_render_with_field_sets_works_correct(): void
    {
        $fieldset = new Fieldset('fieldset');
        $textElement = new Text('text');
        $fieldset->add($textElement);
        $this->form->add($fieldset);

        $output = $this->form->render();
        $this->assertEquals(
            '<form action="" method="POST"><fieldset><input type="text" name="fieldset&#x5B;text&#x5D;" value=""></fieldset></form>',
            $output->toHtml()
        );
    }

    /**
     * @throws ServiceNotFoundException
     * @throws BindingResolutionException
     */
    #[TestWith(['anyOtherHelperMethodThatNoBodyWouldImplement', 'anyOtherHelperMethodThatNoBodyWouldImplementEver'])]
    public function test_render_throws_service_not_found_exception_on_wrong_helper(string $formHelper): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $this->form->render($formHelper);
    }

    public function test_helper_throws_service_not_found_exception_on_invalid_method(): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $helperName = uniqid('anyFakedMethod', true);
        $this->expectExceptionMessage(
            'A plugin by the name "'.$helperName.'" was not found in the plugin manager Laminas\View\HelperPluginManager'
        );
        $this->form->$helperName($this->form);
    }
}
