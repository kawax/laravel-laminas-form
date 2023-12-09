<?php

namespace Revolution\LaminasForm\Tests\Unit;

use Revolution\LaminasForm\Concerns\Renderable;
use Revolution\LaminasForm\Form;
use Revolution\LaminasForm\Tests\TestCase;

class RenderableTraitTest extends TestCase
{
    /**
     * @var Renderable|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $trait;

    public function setUp(): void
    {
        parent::setUp();
        $trait = $this->getMockForTrait(Renderable::class, []);
        $this->trait = $trait;
    }

    public function callDataProvider(): array
    {
        return [
            ['formCollection', '<fieldset ></fieldset>'],
            ['formRow', '<input name="test" type="text" value="">'],
            ['formSubmit', '<input name="test" type="submit" value="">'],
        ];
    }

    /**
     * @param  string  $helperName
     * @param  string  $expectedString
     *
     * @dataProvider callDataProvider
     */
    public function testCallWorks(string $helperName, string $expectedString): void
    {
        $renderer = $this->trait->$helperName(new Form('test'));
        $this->assertStringContainsString($expectedString, $renderer);
    }
}
