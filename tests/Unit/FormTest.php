<?php


namespace Revolution\LaminasForm\Tests\Unit;


use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Revolution\LaminasForm\Form;
use Revolution\LaminasForm\Tests\TestCase;

class FormTest extends TestCase
{

    protected $form;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = new Form();
    }

    /**
     * @param string $formHelper
     * @testWith    ["anyOtherHelperMethodThatNoBodyWouldImplement"]
     *              ["anyOtherHelperMethodThatNoBodyWouldImplementEver"]
     * @throws \Laminas\ServiceManager\Exception\ServiceNotFoundException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
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
            'A plugin by the name "' . $helperName . '" was not found in the plugin manager Laminas\View\HelperPluginManager'
        );
        $this->form->$helperName($this->form);
    }
}