<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class Labyrinth
 * @package Ps\LabyrinthBundle\Model
 */
class Labyrinth
{
    /**
     * @var Tile[][]
     */
    private $tiles = array();

    /**
     * Getter for tiles
     * @return Tile[][]
     */
    public function getTiles()
    {
        return $this->tiles;
    }

    /**
     * @param array $tiles
     * @return $this
     */
    public function setTiles(array $tiles)
    {
        $this->tiles = $tiles;

        return $this;
    }
}