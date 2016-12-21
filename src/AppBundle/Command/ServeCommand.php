<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeCommand extends Command
{
    protected function configure()
    {
      $this
      // the name of the command (the part after "bin/console")
      ->setName('serve')

      // the short description shown while running "php bin/console list"
      ->setDescription('Serve codalizer')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp("This command allows you to serve the codalizer...");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      // outputs multiple lines to the console (adding "\n" at the end of each line)
      $output->writeln([
          'Serving start',
          '=============',
          '',
      ]);

      $output->writeln([
        shell_exec('php -S 127.0.0.1:8000')
      ]);

      // outputs a message followed by a "\n"
      $output->writeln('Codalizer served!');

    }
}
