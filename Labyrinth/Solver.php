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
     * @var Manager
     */
    private $manager;

    /**
     * @param Reader $reader
     * @param Queue $queue
     * @param Manager $manager
     */
    public function __construct(Reader $reader, Queue $queue, Manager $manager)
    {
        $this->reader = $reader;
        $this->queue = $queue;
        $this->manager = $manager;
    }

    /**
     * @param string $filePath
     * @throws \Exception
     * @returns Labyrinth
     */
    public function solve($filePath)
    {
        $tiles = $this->reader->getLabyrinth($filePath);
        $labyrinth = new Labyrinth();
        $this->manager->setTextTiles($labyrinth, $tiles);

        $start = $this->manager->getStart($labyrinth);
        $start->setCounter(1);
        $this->queue->push($start);

        $endTile = $this->stepForward($labyrinth);
        $this->manager->markWinningPath($labyrinth, $endTile);

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

        $paths = $this->manager->getPossiblePaths($labyrinth, $tile);
        foreach ($paths as $path) {

            $path->setCounter($tile->getCounter()+1);
            $this->queue->push($path);
        }

        return $this->stepForward($labyrinth);
    }
} 