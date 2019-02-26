<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/02/2019
 * Time: 23:20
 */

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
//    protected static $defaultName = 'test';

    protected function configure()
    {
        $this->setName('test')
            ->setDescription('Test!')
            ->setHelp('Symfony Console component.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Test!!!'));
    }
}