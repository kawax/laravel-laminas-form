<?php

namespace Revolution\LaminasForm\Tests\Unit;

use Laminas\Form\Element\Text;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use PHPUnit\Framework\Attributes\TestWith;
use Revolution\LaminasForm\Fieldset;
use Revolution\LaminasForm\Form;
use Revolution\LaminasForm\Tests\TestCase;

class FormTest extends TestCase
{
    protected Form $form;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = new Form();
    }

    public function testRenderWithElementsWorksCorrect(): void
    {
        $textElement = new Text('text');
        $this->form->add($textElement);

        $output = $this->form->render();
        $this->assertEquals(
            '<form action="" method="POST"><input type="text" name="text" value=""></form>',
            $output->toHtml()
        );
    }

    public function testRenderWithFieldSetsWorksCorrect(): void
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
     * @param  string  $formHelper
     *
     * @throws \Laminas\ServiceManager\Exception\ServiceNotFoundException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    #[TestWith(['anyOtherHelperMethodThatNoBodyWouldImplement', 'anyOtherHelperMethodThatNoBodyWouldImplementEver'])]
    public function testRenderThrowsServiceNotFoundExceptionOnWrongHelper(string $formHelper): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $this->form->render($formHelper);
    }

    public function testHelperThrowsServiceNotFoundExceptionOnInvalidMethod(): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $helperName = uniqid('anyFakedMethod', true);
        $this->expectExceptionMessage(
            'A plugin by the name "'.$helperName.'" was not found in the plugin manager Laminas\View\HelperPluginManager'
        );
        $this->form->$helperName($this->form);
    }
}
