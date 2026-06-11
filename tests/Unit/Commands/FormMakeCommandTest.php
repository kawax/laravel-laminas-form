<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\Tests\Unit\Commands;

use Illuminate\Filesystem\Filesystem;
use Revolution\LaminasForm\Commands\FormMakeCommand;
use Revolution\LaminasForm\Tests\TestCase;

class FormMakeCommandTest extends TestCase
{
    protected FormMakeCommand $command;

    protected function setUp(): void
    {
        parent::setUp();
        /**
         * @var Filesystem $mockedFileSystem
         */
        $mockedFileSystem = $this->getMockBuilder(Filesystem::class)->getMock();
        $this->command = new FormMakeCommand($mockedFileSystem);
    }

    public function test_name_equals_default_name(): void
    {
        $this->assertEquals('make:form', $this->command->getName());
    }

    public function test_description_equals_default_description(): void
    {
        $this->assertEquals('Create a new form class', $this->command->getDescription());
    }
}
