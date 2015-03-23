<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class PathTile
 * @package Ps\LabyrinthBundle\Model
 */
class PathTile extends Tile
{
    /**
     * @var string
     */
    const CHAR = '.';

    /**
     * Returns a character that represents the object in a textual version of labyrinth
     * @return string
     */
    public function getTypeChar()
    {
        return self::CHAR;
    }
}