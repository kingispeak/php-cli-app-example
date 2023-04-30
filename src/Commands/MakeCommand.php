<?php

namespace PhpCliAppExample\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommand extends Command
{
    protected static $defaultName = 'make:command';

    protected function configure(): void
    {
        $this->setDescription('List all songs from a Spotify playlist')
            ->addArgument('playlist', InputArgument::REQUIRED, 'The Spotify playlist ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $playlist = $input->getArgument('playlist');

        echo $playlist;

        return Command::SUCCESS;
    }
}