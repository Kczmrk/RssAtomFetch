<?php

namespace KacperKaczmarek\Tests\Command;

use KacperKaczmarek\Command\CsvExtendedCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CsvExtendedCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testExecute() {
        $application = new Application();
        $application->add(new CsvExtendedCommand());

        $command = $application->find('csv:extended');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
            // pass arguments to the helper
            'url' => 'http://feeds.nationalgeographic.com/ng/News/News_Main',
            'path' => 'test.csv'
        ));

        $output = $commandTester->getDisplay();
        $this->assertContains('Done! RSS/Atom feed has been saved into the .csv file!', $output);
    }

}