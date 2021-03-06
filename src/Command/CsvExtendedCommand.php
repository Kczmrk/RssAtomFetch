<?php

namespace KacperKaczmarek\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use KacperKaczmarek\Service\CsvService;

class CsvExtendedCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('csv:extended')
            ->setDescription("Saves RSS/Atom feed to .csv file (doesn't remove old feed if exists)")
            ->addArgument('url', InputArgument::REQUIRED, 'The URL with RSS/Atom data')
            ->addArgument('path', InputArgument::REQUIRED, 'The PATH of the csv file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $path = $input->getArgument('path');

        $csvService = new CsvService($path, 'a');
        $csvService->addHeaders('title', 'description', 'link', 'pubDate', 'creator');
        $csvService->addFeed($url);
        $csvService->closeFile();

        $output->writeln('Done! RSS/Atom feed has been saved into the .csv file!');
    }
}