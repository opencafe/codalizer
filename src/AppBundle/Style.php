<?php

/**
 * Anetwork Console | ConsoleStyle
 *
 * @author Alireza Josheghani <a.josheghani@anetwork.ir>
 * @version 0.1
 */
namespace OpenCafe\Codalizer\AppBundle;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Style extends SymfonyCommand
{
    protected $verbosity = OutputInterface::VERBOSITY_NORMAL;

    protected $verbosityMap = [
        'v'      => OutputInterface::VERBOSITY_VERBOSE,
        'vv'     => OutputInterface::VERBOSITY_VERY_VERBOSE,
        'vvv'    => OutputInterface::VERBOSITY_DEBUG,
        'quiet'  => OutputInterface::VERBOSITY_QUIET,
        'normal' => OutputInterface::VERBOSITY_NORMAL,
    ];

    protected $output;

    protected $input;

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        parent::__construct('Anetwork');
        $this->input = $input;
        $this->output = new SymfonyStyle($input,$output);
    }

    /**
     * Write a string as information output.
     *
     * @param  string  $string
     * @param  null|int|string  $verbosity
     * @return void
     */
    public function info($string, $verbosity = null)
    {
        $this->line($string, 'info', $verbosity);
    }

    /**
     * Write a string as error output.
     *
     * @param  string  $string
     * @param  null|int|string  $verbosity
     * @return void
     */
    public function error($string, $verbosity = null)
    {
        $this->line($string, 'ERROR', $verbosity);
    }

    /**
     * @param array ...$args
     */
    public function success(...$args)
    {
        $this->output->success(...$args);
    }

    /**
     * @param array ...$args
     */
    public function danger(...$args)
    {
        $this->output->error(...$args);
    }

    /**
     * Write a string as standard output.
     *
     * @param  string  $string
     * @param  string  $style
     * @param  null|int|string  $verbosity
     * @return void
     */
    public function line($string, $style = null, $verbosity = null)
    {
        $styled = $style ? "<$style>$string</$style>" : $string;
        $this->output->writeln($styled, $this->parseVerbosity($verbosity));
    }

    /**
     * Get the verbosity level in terms of Symfony's OutputInterface level.
     *
     * @param  string|int  $level
     * @return int
     */
    protected function parseVerbosity($level = null)
    {
        if (isset($this->verbosityMap[$level])) {
            $level = $this->verbosityMap[$level];
        } elseif (! is_int($level)) {
            $level = $this->verbosity;
        }
        return $level;
    }
}