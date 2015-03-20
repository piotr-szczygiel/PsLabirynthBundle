<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class Tile
 * @package Ps\LabyrinthBundle\Model
 */
abstract class Tile
{
    /**
     * @var int
     */
    protected $counter = 0;

    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * @param int $x
     * @return $this
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Getter for X
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $y
     * @return $this
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Getter for Y
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $newCounter
     * @return $this
     */
    public function setCounter($newCounter)
    {
        $this->counter = $newCounter;

        return $this;
    }

    /**
     * Getter for counter
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }
} 