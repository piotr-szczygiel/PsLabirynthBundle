<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\Tile;

/**
 * Class Queue
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Queue
{
    /**
     * @var Tile[]
     */
    private $tiles = array();

    /**
     * Adds a tile at the end of queue
     * @param Tile $tile
     * @return $this
     */
    public function push(Tile $tile)
    {
        $this->tiles[] = $tile;

        return $this;
    }

    /**
     * Removes first element of the queue
     * @return Tile
     */
    public function getAndShift()
    {
        $tile = array_shift($this->tiles);

        return $tile;
    }
}