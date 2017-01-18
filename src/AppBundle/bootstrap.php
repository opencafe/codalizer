<?php

/*
|--------------------------------------------------------------------------
| Define the commands
|--------------------------------------------------------------------------
|
| Define the needed commands
|
*/

$commands = [
    OpenCafe\Codalizer\AppBundle\Command\GenerateReportCommand::class,
    OpenCafe\Codalizer\AppBundle\Command\ServeCommand::class
];

/*
|--------------------------------------------------------------------------
| Register the commands
|--------------------------------------------------------------------------
|
| registered the needed commands to application
|
*/

array_walk($commands,function ($command) use($app){
    $app->add(new $command);
});