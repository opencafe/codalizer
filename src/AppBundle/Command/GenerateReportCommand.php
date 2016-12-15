<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateReportCommand extends Command
{
    protected function configure()
    {
      $this
      // the name of the command (the part after "bin/console")
      ->setName('report:make')

      // the short description shown while running "php bin/console list"
      ->setDescription('Generate reports')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp("This command allows you to generate reports...")
      ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      // outputs multiple lines to the console (adding "\n" at the end of each line)
      $output->writeln([
          'Report Generator',
          '================',
          '',
      ]);

      // outputs a message followed by a "\n"
      $output->writeln('Whoa!');

      // outputs a message without adding a "\n" at the end of the line
      $output->write('You are about to ');
      $output->write('generate reports.');

    }
}
