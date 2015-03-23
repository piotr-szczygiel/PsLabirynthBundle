<?php
namespace Ps\LabyrinthBundle\Command;

use Ps\LabyrinthBundle\Model\Labyrinth;
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
        $labyrinth = $solver->solve($input->getArgument('file'));

        $this->dumpLabyrinth($labyrinth, $output);
    }

    /**
     * Prints out the labyrinth with marked path
     * @param Labyrinth $labyrinth
     * @param OutputInterface $output
     * @return $this
     */
    private function dumpLabyrinth(Labyrinth $labyrinth, OutputInterface $output)
    {
        foreach ($labyrinth->getTextTiles() as $y => $row) {

            if ($y % 2 === 0) {

                $output->writeln($row);
            }
            else {

                for ($x = 0; $x < strlen($row); $x++) {

                    if ($x % 2 === 0) {

                        $output->write($row[$x]);
                    }
                    else {

                        $tile = $labyrinth->getTile($y, $x);
                        $color = $tile->getWinner() ? 'red' : 'white';
                        $output->write('<fg=' . $color . '>' . $tile->getTypeChar() . '</fg=' . $color . '>');
                    }
                }

                $output->writeln('');
            }
        }

        return $this;
    }
} 