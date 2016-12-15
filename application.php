#!/usr/bin/php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new AppBundle\Command\GenerateReportCommand() );

$application->run();
