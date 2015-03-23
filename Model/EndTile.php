<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class EndTile
 * @package Ps\LabyrinthBundle\Model
 */
class EndTile extends Tile
{
    /**
     * @var string
     */
    const CHAR = 'E';

    /**
     * Returns a character that represents the object in a textual version of labyrinth
     * @return string
     */
    public function getTypeChar()
    {
        return self::CHAR;
    }
}