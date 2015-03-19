<?php
namespace Ps\LabyrinthBundle\Model;

/**
 * Class Tile
 * @package Ps\LabyrinthBundle\Model
 */
class Tile
{
    /**
     * @var string
     */
    const ROLE_START = 'start';

    /**
     * @var string
     */
    const ROLE_END = 'end';

    /**
     * @var string
     */
    const ROLE_PLAIN = 'plain';

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $counter;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

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
     * @param int $y
     * @return $this
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
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
     * @param string $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
} 