<?php


namespace Revolution\LaminasForm\Tests\Unit;


use Laminas\Form\Element\Text;
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
}