<?php

namespace PhpCliAppExample\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command
{
    protected static $defaultName = 'example:songs';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('List all songs from a Spotify playlist')
            ->addArgument('playlist', InputArgument::REQUIRED, 'The Spotify playlist ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $playlist = $input->getArgument('playlist');

        $output->writeln([
            `====**** List $playlist songs from a Spotify playlist ****====`,
            '',
        ]);

        $songs = $this->getSongs($playlist);

        $table = new Table($output);
        $table->setHeaders(['Title', 'Artist', 'Album', 'Duration']);

        foreach ($songs as $song) {
            $table->addRow([
                $song['title'],
                $song['artist'],
                $song['album'],
                $song['duration']
            ]);
        }

        $table->render();

        return Command::SUCCESS;
    }

    private function getSongs(string $playlist): array
    {
        if ($playlist === 'first') {
            return [
                [
                    'title' => 'Song 1',
                    'artist' => 'Artist 1',
                    'album' => 'Album 1',
                    'duration' => '3:00'
                ],
                [
                    'title' => 'Song 2',
                    'artist' => 'Artist 2',
                    'album' => 'Album 2',
                    'duration' => '3:00'
                ],
                [
                    'title' => 'Song 3',
                    'artist' => 'Artist 3',
                    'album' => 'Album 3',
                    'duration' => '3:00'
                ],
            ];
        } elseif ($playlist === 'second') {
            return [
                [
                    'title' => 'Song 4',
                    'artist' => 'Artist 4',
                    'album' => 'Album 4',
                    'duration' => '3:00'
                ],
                [
                    'title' => 'Song 5',
                    'artist' => 'Artist 5',
                    'album' => 'Album 5',
                    'duration' => '3:00'
                ],
                [
                    'title' => 'Song 6',
                    'artist' => 'Artist 6',
                    'album' => 'Album 6',
                    'duration' => '3:00'
                ],
            ];
        }
        return [];
    }
}