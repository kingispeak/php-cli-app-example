<?php

namespace PhpCliAppExample;

use PhpCliAppExample\Commands\ExampleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;

class ExampleCLI
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->addDefaultCommands();
    }

    public function run(): void
    {
        $this->application->run();
    }

    public function getApplication(): Application
    {
        return $this->application;
    }

    public function setApplication(Application $application): void
    {
        $this->application = $application;
    }

    public function addCommand(Command $command): void
    {
        $this->application->add($command);
    }

    public function getCommand(string $name): Command
    {
        return $this->application->get($name);
    }

    public function addDefaultCommands(): void
    {
        $this->application->add(new ExampleCommand());
    }
}