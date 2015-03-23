<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\EndTile;
use Ps\LabyrinthBundle\Model\Labyrinth;

/**
 * Class Solver
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Solver
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var Queue
     */
    private $queue;

    /**
     * @param Reader $reader
     * @param Queue $queue
     */
    public function __construct(Reader $reader, Queue $queue)
    {
        $this->reader = $reader;
        $this->queue = $queue;
    }

    /**
     * @param string $filePath
     * @throws \Exception
     * @returns Labyrinth
     */
    public function solve($filePath)
    {
        $labyrinth = $this->reader->getLabyrinth($filePath);

        $start = $labyrinth->getStart();
        $start->setCounter(1);
        $this->queue->push($start);

        $endTile = $this->stepForward($labyrinth);
        $labyrinth->markWinningPath($endTile);

        return $labyrinth;
    }

    /**
     * Recurrent function that makes a step in the labyrinth
     * @param Labyrinth $labyrinth
     * @return \Ps\LabyrinthBundle\Model\Tile
     */
    private function stepForward(Labyrinth $labyrinth)
    {
        $tile = $this->queue->getAndShift();
        if ($tile instanceof EndTile) {

            return $tile;
        }

        $paths = $labyrinth->getPossiblePaths($tile);
        foreach ($paths as $path) {

            $path->setCounter($tile->getCounter()+1);
            $this->queue->push($path);
        }

        return $this->stepForward($labyrinth);
    }
} 