<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\Tests\Unit;

use Illuminate\Contracts\Container\BindingResolutionException;
use Laminas\Form\Element\Text;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use PHPUnit\Framework\Attributes\TestWith;
use Revolution\LaminasForm\Fieldset;
use Revolution\LaminasForm\Tests\TestCase;

class FieldsetTest extends TestCase
{
    protected Fieldset $fieldset;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fieldset = new Fieldset;
    }

    public function test_render_works_correct(): void
    {
        $textElement = new Text('text');
        $this->fieldset->add($textElement);

        $output = $this->fieldset->render();
        $this->assertEquals('<fieldset><input type="text" name="text" value=""></fieldset>', $output->toHtml());
    }

    /**
     * @throws ServiceNotFoundException
     * @throws BindingResolutionException
     */
    #[TestWith(['anyOtherHelperMethodThatNoBodyWouldImplement', 'anyOtherHelperMethodThatNoBodyWouldImplementEver'])]
    public function test_render_throws_service_not_found_exception_on_wrong_helper(string $formHelper): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $this->fieldset->render($formHelper);
    }

    public function test_helper_throws_service_not_found_exception_on_invalid_method(): void
    {
        $this->expectException(ServiceNotFoundException::class);
        $helperName = uniqid('anyFakedMethod', true);
        $this->expectExceptionMessage(
            'A plugin by the name "'.$helperName.'" was not found in the plugin manager Laminas\View\HelperPluginManager'
        );
        $this->fieldset->$helperName($this->fieldset);
    }
}
