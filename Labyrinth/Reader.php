<?php
namespace Ps\LabyrinthBundle\Labyrinth;
use Ps\LabyrinthBundle\Model\Tile;

/**
 * Class Reader
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Reader
{
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
        $sampleTile = new Tile();
        $sampleTile->setCounter(0);
        $tilesArray = array();

        foreach ($labyrinthArray as $x => $row) {

            foreach ($row as $y => $character) {

                $tile = clone $sampleTile;
                $tile
                    ->setRole($this->getRole($character))
                    ->setX($x)
                    ->setY($y)
                ;

                $tilesArray[$x][$y] = $tile;
            }
        }

        return $tilesArray;
    }

    /**
     * Maps characters into proper roles
     * @param string $character
     * @return string
     */
    private function getRole($character)
    {
        switch ($character) {

            case 'S':
            case 's':
                $role = Tile::ROLE_START;
                break;

            case 'E':
            case 'e':
                $role = Tile::ROLE_END;
                break;

            default:
                $role = Tile::ROLE_PLAIN;
                break;
        }

        return $role;
    }
} 