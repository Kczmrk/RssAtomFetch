#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use KacperKaczmarek\Command\CsvSimpleCommand;
use KacperKaczmarek\Command\CsvExtendedCommand;

$application = new Application();
$application->add(new CsvSimpleCommand());
$application->add(new CsvExtendedCommand());
$application->run();