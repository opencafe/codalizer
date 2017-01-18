<?php

namespace OpenCafe\Codalizer\AppBundle\Command;

use OpenCafe\Codalizer\AppBundle\Style;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use OpenCafe\Codalizer\ReportGenerator;

class GenerateReportCommand extends Command
{
    /**
     * configure the command
     *
     * @retrun void
     */
    protected function configure()
    {
        $this->setName('generate:report')
            ->setDescription('Generate reports from project')
            ->setHelp("This command allows you to generate reports...");

        $this->addArgument('directory',InputArgument::REQUIRED,'The Project directory');
    }

    /**
     * Excecute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $style = new Style($input,$output);

        // outputs multiple lines to the console (adding "\n" at the end of each line)
        if(ReportGenerator::make($input->getArgument('directory'))){
            return $style->info('Report Generated successfuly!');
        }

        return $style->danger('Report Generated faild!');
    }
}
