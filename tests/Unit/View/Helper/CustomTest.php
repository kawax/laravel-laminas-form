<?php


namespace Revolution\LaminasForm\Tests\Unit\View\Helper;

use Laminas\Form\{ConfigProvider, Element\Submit, Element\Text, Form};
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\HelperPluginManager;
use Laminas\View\Renderer\PhpRenderer;
use Revolution\LaminasForm\Tests\TestCase;
use Revolution\LaminasForm\View\Helper\Custom;

class CustomTest extends TestCase
{
    protected $helper;

    public function setUp(): void
    {
        parent::setUp();
        $helper = new Custom();
        $renderer = new PhpRenderer();
        $configProvider = new ConfigProvider();
        $renderer->setHelperPluginManager(
            new HelperPluginManager(
                new ServiceManager(),
                $configProvider->getViewHelperConfig()
            )
        );

        $helper->setView($renderer);
        $this->helper = $helper;
    }

    public function testRenderWithRowElementShouldWork(): void
    {
        $form = new Form('name');
        $element = new Text(uniqid('myUniqueName', true));
        $form->add($element);
        $output = $this->helper->render($form);
        $this->assertStringContainsString(
            '<form action="" method="POST" name="name" id="name"><div class="form-group row"><div class="col-sm-10">',
            $output
        );
        $this->assertStringContainsString('</div></div></form>', $output);
    }

    /**
     * @param bool $withValue
     * @testWith    [true]
     *              [false]
     */
    public function testRenderWithSubmitElementShouldWork(bool $withValue): void
    {
        $value = 'Submit';
        $form = new Form('name');
        $element = new Submit(uniqid('myUniqueName', true));
        if ($withValue) {
            $value = time();
            $element->setValue($value);
        }
        $form->add($element);
        $output = $this->helper->render($form);
        $this->assertStringContainsString(
            '<button type="submit" class="btn btn-primary">' . $value . '</button>',
            $output
        );
    }

    public function testRenderWithHelpTextShouldWork(): void
    {
        $form = new Form('name');
        $element = new Text(uniqid('myUniqueName', true));
        $element->setOption('help-text', 'Have you mooed today?');
        $form->add($element);
        $output = $this->helper->render($form);
        $this->assertStringContainsString(
            '<small class="form-text text-muted">Have you mooed today?</small>',
            $output
        );
    }
}