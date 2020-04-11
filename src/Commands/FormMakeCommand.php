<?php

namespace Revolution\LaminasForm\Commands;

use Illuminate\Console\GeneratorCommand;

class FormMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:form';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new form class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Form';

    /**
     * Get the stub file for the generator.
     * @codeCoverageIgnore
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/form.stub';
    }

    /**
     * Get the default namespace for the class.
     * @codeCoverageIgnore
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Http\Forms';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [];
    }
}
