<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\StartTile;
use Ps\LabyrinthBundle\Model\Tile;

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
     * @param Reader $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param string $filePath
     * @throws \Exception
     */
    public function solve($filePath)
    {
        $labyrinthArray = $this->reader->getLabyrinthArray($filePath);
        $startTile = $this->findStart($labyrinthArray);

        print '<pre>';
        print_r($startTile);
        print '</pre>';
    }

    /**
     * Returns the start Tile
     * @param Tile[] $labyrinthArray
     * @return StartTile
     * @throws \Exception
     */
    private function findStart(array $labyrinthArray)
    {
        foreach ($labyrinthArray as $row) {

            foreach ($row as $tile) {

                if ($tile instanceof StartTile) {
                    return $tile;
                }
            }
        }

        throw new \Exception('Labyrinth does not contain a start point.');
    }
} 