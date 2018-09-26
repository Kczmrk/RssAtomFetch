<?php

namespace KacperKaczmarek\Tests\Command;

use KacperKaczmarek\Command\CsvSimpleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CsvSimpleCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testExecute() {
        $application = new Application();
        $application->add(new CsvSimpleCommand());

        $command = $application->find('csv:simple');
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