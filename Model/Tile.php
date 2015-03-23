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
     * @var bool
     */
    protected $winner = false;

    /**
     * @var bool
     */
    protected $topWall;

    /**
     * @var bool
     */
    protected $rightWall;

    /**
     * @var bool
     */
    protected $bottomWall;

    /**
     * @var bool
     */
    protected $leftWall;

    /**
     * Returns a character that represents the object in a textual version of labyrinth
     * @return string
     */
    abstract public function getTypeChar();

    /**
     * Setter for topWall
     * @param bool $topWall
     * @return $this
     */
    public function setTopWall($topWall)
    {
        $this->topWall = $topWall;

        return $this;
    }

    /**
     * Setter for rightWall
     * @param bool $rightWall
     * @return $this
     */
    public function setRightWall($rightWall)
    {
        $this->rightWall = $rightWall;

        return $this;
    }

    /**
     * Setter for bottomWall
     * @param bool $bottomWall
     * @return $this
     */
    public function setBottomWall($bottomWall)
    {
        $this->bottomWall = $bottomWall;

        return $this;
    }

    /**
     * Setter for leftWall
     * @param bool $leftWall
     * @return $this
     */
    public function setLeftWall($leftWall)
    {
        $this->leftWall = $leftWall;

        return $this;
    }

    /**
     * Getter for topWall
     * @return bool
     */
    public function getTopWall()
    {
        return $this->topWall;
    }

    /**
     * Getter for rightWall
     * @return bool
     */
    public function getRightWall()
    {
        return $this->rightWall;
    }

    /**
     * Getter for bottomWall
     * @return bool
     */
    public function getBottomWall()
    {
        return $this->bottomWall;
    }

    /**
     * Getter for leftWall
     * @return bool
     */
    public function getLeftWall()
    {
        return $this->leftWall;
    }

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

    /**
     * @param bool $winner
     * @return $this
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    public function getWinner()
    {
        return $this->winner;
    }
} 