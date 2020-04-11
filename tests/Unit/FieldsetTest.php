<?php


namespace Revolution\LaminasForm\Tests\Unit;


use Laminas\Form\Element\Text;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Revolution\LaminasForm\Fieldset;
use Revolution\LaminasForm\Tests\TestCase;

class FieldsetTest extends TestCase
{
    protected $fieldset;

    public function setUp(): void
    {
        parent::setUp();
        $this->fieldset = new Fieldset();
    }

    public function testRenderWorksCorrect(): void
    {
        $textElement = new Text('text');
        $this->fieldset->add($textElement);

        $output = $this->fieldset->render();
        $this->assertEquals('<fieldset><input type="text" name="text" value=""></fieldset>', $output->toHtml());
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
        $this->fieldset->render($formHelper);
    }

    public function testHelperThrowsServiceNotFoundExceptionOnInvalidMethod(): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $helperName = uniqid('anyFakedMethod', true);
        $this->expectExceptionMessage(
            'A plugin by the name "' . $helperName . '" was not found in the plugin manager Laminas\View\HelperPluginManager'
        );
        $this->fieldset->$helperName($this->fieldset);
    }
}