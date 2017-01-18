<?php

namespace OpenCafe\Codalizer\AppBundle\Command;

use OpenCafe\Codalizer\AppBundle\Style;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeCommand extends Command
{
    /**
     * configure the command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('serve')
            ->setDescription('Serve codalizer')
            ->setHelp("This command allows you to serve the codalizer...");

        $this->addOption('host','o',InputOption::VALUE_OPTIONAL,'The serve host.','localhost');

        $this->addOption('port','p',InputOption::VALUE_OPTIONAL,'The serve port.','8000');
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @retrun void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $style = new Style($input,$output);

        $host = $input->getOption('host');
        $port = $input->getOption('port');

        $style->info("Codilizer development server started on http://$host:$port");

        exec("php -S $host:$port");
    }
}
