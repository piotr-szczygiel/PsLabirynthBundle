<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class Labyrinth
 * @package Ps\LabyrinthBundle\Model
 */
class Labyrinth
{
    /**
     * @var Tile[]
     */
    private $tiles = array();

    /**
     * @param array $tiles
     * @return array
     */
    public function setTiles(array $tiles)
    {
        $this->tiles = $tiles;

        return $tiles;
    }

    /**
     * Returns the start Tile
     * @return StartTile
     * @throws \Exception
     */
    public function getStart()
    {
        foreach ($this->tiles as $row) {

            foreach ($row as $tile) {

                if ($tile instanceof StartTile) {
                    return $tile;
                }
            }
        }

        throw new \Exception('Labyrinth does not contain a start point.');
    }

    /**
     * Return all possible steps from given base tile
     * @param Tile $baseTile
     * @return Tile[]
     */
    public function getPossiblePaths(Tile $baseTile)
    {
        $paths = array();

        // check above tile
        $aboveTile = $this->checkPathCorrectnes($baseTile->getX(), $baseTile->getY()-1, $baseTile);
        if ($aboveTile instanceof Tile) {
            $paths[] = $aboveTile;
        }

        // check below tile
        $belowTile = $this->checkPathCorrectnes($baseTile->getX(), $baseTile->getY()+1, $baseTile);
        if ($belowTile instanceof Tile) {
            $paths[] = $belowTile;
        }

        // check right tile
        $rightTile = $this->checkPathCorrectnes($baseTile->getX()+1, $baseTile->getY(), $baseTile);
        if ($rightTile instanceof Tile) {
            $paths[] = $rightTile;
        }

        // check left tile
        $leftTile = $this->checkPathCorrectnes($baseTile->getX()-1, $baseTile->getY(), $baseTile);
        if ($leftTile instanceof Tile) {
            $paths[] = $leftTile;
        }

        return $paths;
    }

    /**
     * Validates given coordinates in order to get a correct path tile
     * @param int $x
     * @param int $y
     * @return null|EndTile|PathTile
     */
    private function checkPathCorrectnes($x, $y, Tile $baseTile)
    {
        $correctTile = null;
        if (isset($this->tiles[$x][$y])) {

            $tile = $this->tiles[$x][$y];
            if ($tile->getCounter() === 0 && ($tile instanceof PathTile || $tile instanceof EndTile)) {

                $correctTile = $tile;
            }
        }

        return $correctTile;
    }
}