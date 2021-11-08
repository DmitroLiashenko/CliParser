<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use CliParser\ParserCommand;
use CliParser\WebParser;

$application = new Application();

// ... register commands
$application->add(new ParserCommand(new WebParser));
$application->run();

