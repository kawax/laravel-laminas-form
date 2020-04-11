<?php


namespace Revolution\LaminasForm\Tests\Unit\Commands;


use Illuminate\Filesystem\Filesystem;
use Revolution\LaminasForm\Commands\FormMakeCommand;
use Revolution\LaminasForm\Tests\TestCase;

class FormMakeCommandTest extends TestCase
{
    protected $command;

    public function setUp(): void
    {
        parent::setUp();
        /**
         * @var Filesystem $mockedFileSystem
         */
        $mockedFileSystem = $this->getMockBuilder(Filesystem::class)->getMock();
        $this->command = new FormMakeCommand($mockedFileSystem);
    }

    public function testNameEqualsDefaultName(): void
    {
        $this->assertEquals('make:form', $this->command->getName());
    }

    public function testDescriptionEqualsDefaultDescription(): void
    {
        $this->assertEquals('Create a new form class', $this->command->getDescription());
    }


}