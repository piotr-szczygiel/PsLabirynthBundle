<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class StartTile
 * @package Ps\LabyrinthBundle\Model
 */
class StartTile extends Tile
{
    /**
     * @var string
     */
    const CHAR = 'S';

    /**
     * Returns a character that represents the object in a textual version of labyrinth
     * @return string
     */
    public function getTypeChar()
    {
        return self::CHAR;
    }
}