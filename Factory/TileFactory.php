<?php
namespace Ps\LabyrinthBundle\Factory;

use Ps\LabyrinthBundle\Model\EndTile;
use Ps\LabyrinthBundle\Model\PathTile;
use Ps\LabyrinthBundle\Model\StartTile;

/**
 * Class TileFactory
 * @package Ps\LabyrinthBundle\Factory
 */
class TileFactory
{
    /**
     * Getter method for the factory
     * @param string $char
     * @throws \Exception
     * @returns \Ps\LabyrinthBundle\Model\Tile
     */
    public function getTile($char)
    {
        switch ($char) {

            case StartTile::CHAR:
                $tile = new StartTile();
                break;

            case EndTile::CHAR:
                $tile = new EndTile();
                break;

            case PathTile::CHAR:
                $tile = new PathTile();
                break;

            default:
                throw new \Exception('Unrecognized labyrinth character: "' . $char . '"');
                break;
        }

        return $tile;
    }
}