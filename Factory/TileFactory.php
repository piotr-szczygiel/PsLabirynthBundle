<?php
namespace Ps\LabyrinthBundle\Factory;

use Ps\LabyrinthBundle\Model\EndTile;
use Ps\LabyrinthBundle\Model\PathTile;
use Ps\LabyrinthBundle\Model\StartTile;
use Ps\LabyrinthBundle\Model\Tile;
use Ps\LabyrinthBundle\Model\WallTile;

/**
 * Class TileFactory
 * @package Ps\LabyrinthBundle\Factory
 */
class TileFactory
{
    /**
     * @param $char
     * @returns Tile
     */
    public function getTile($char)
    {
        switch ($char) {

            case 'S':
            case 's':
                $tile = new StartTile();
                break;

            case 'E':
            case 'e':
                $tile = new EndTile();
                break;

            case '.':
                $tile = new PathTile();
                break;

            default:
                $tile = new WallTile();
                break;
        }

        return $tile;
    }
}