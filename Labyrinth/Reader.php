<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\Tile;
use Ps\LabyrinthBundle\Factory\TileFactory;

/**
 * Class Reader
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Reader
{
    /**
     * @var TileFactory
     */
    private $tileFactory;

    /**
     * @param TileFactory $tileFactory
     */
    public function __construct(TileFactory $tileFactory)
    {
        $this->tileFactory = $tileFactory;
    }

    /**
     * Reads given file and returns a multi-dimensional array of Tile objects
     * @param string $filePath
     * @return Tile[][]
     */
    public function getLabyrinthArray($filePath)
    {
        $labyrinthArray = array();
        $fileContent = file($filePath);

        foreach($fileContent as $line) {
            $labyrinthArray[] = explode(' ', $line);
        }

        $labyrinthArray = $this->fillWithObjects($labyrinthArray);
        return $labyrinthArray;
    }

    /**
     * Fills given labyrinth array with Tile objects
     * @param array $labyrinthArray
     * @return Tile[][]
     */
    private function fillWithObjects(array $labyrinthArray)
    {
        $tilesArray = array();
        foreach ($labyrinthArray as $x => $row) {

            foreach ($row as $y => $character) {

                $tile = $this->tileFactory->getTile($character);
                $tile->setX($x)->setY($y);

                $tilesArray[$x][$y] = $tile;
            }
        }

        return $tilesArray;
    }
} 