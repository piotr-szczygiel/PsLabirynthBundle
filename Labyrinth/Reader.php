<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\Labyrinth;
use Ps\LabyrinthBundle\Factory\TileFactory;
use Ps\LabyrinthBundle\Model\Tile;

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
     * Reads given file and returns a Labyrinth model object
     * @param string $filePath
     * @return Labyrinth
     */
    public function getLabyrinth($filePath)
    {
        $tiles = array();
        $fileContent = file($filePath);

        foreach($fileContent as $line) {
            $tiles[] = explode(' ', trim($line));
        }

        $tiles = $this->fillWithObjects($tiles);
        $labyrinth = new Labyrinth();
        $labyrinth->setTiles($tiles);

        return $labyrinth;
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