<?php
namespace Ps\LabyrinthBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LabyrinthSolverCommand
 * @package Ps\LabyrinthBundle\Command
 */
class LabyrinthSolverCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('labyrinth:solve')
            ->setDescription('Command for finding a path in a custom labyrinth')
            ->addArgument('file', InputArgument::REQUIRED, 'The path to file that contains labyrinth');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $solver = $this->getContainer()->get('ps_labyrinth.labyrinth.solver');
        $solver->solve($input->getArgument('file'));

        $output->writeln(sprintf('Hello <comment>%s</comment>!', $input->getArgument('file')));
    }
} 