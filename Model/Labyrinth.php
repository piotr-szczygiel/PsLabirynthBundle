<?php
namespace Ps\LabyrinthBundle\Model;
use Ps\LabyrinthBundle\Factory\TileFactory;

/**
 * Class Labyrinth
 * @package Ps\LabyrinthBundle\Model
 */
class Labyrinth
{
    /**
     * @var Tile[][]
     */
    private $tiles = array();

    /**
     * @var TileFactory
     */
    private $tileFactory;

    /**
     * @var array
     */
    private $textTiles;

    /**
     * @param TileFactory $tileFactory
     */
    public function __construct(TileFactory $tileFactory)
    {
        $this->tileFactory = $tileFactory;
    }

    /**
     * @param array $tiles
     * @return $this
     */
    public function setTiles(array $tiles)
    {
        $this->textTiles = $tiles;

        for ($y=1; $y < sizeof($this->textTiles); $y+=2) {

            for($x=1; $x < strlen($this->textTiles[$y]); $x+=2) {

                $tile = $this->tileFactory->getTile($this->textTiles[$y][$x]);
                $tile
                    ->setX($x)->setY($y)
                    ->setTopWall($this->textTiles[$y-1][$x] !== ' ')
                    ->setRightWall($this->textTiles[$y][$x+1] !== ' ')
                    ->setBottomWall($this->textTiles[$y+1][$x] !== ' ')
                    ->setLeftWall($this->textTiles[$y][$x-1] !== ' ')
                ;

                $this->tiles[$y][$x] = $tile;
            }
        }

        return $this;
    }

    /**
     * Getter for tiles
     * @return Tile[][]
     */
    public function getTiles()
    {
        return $this->tiles;
    }

    /**
     * Getter for text tiles
     * @return array
     */
    public function getTextTiles()
    {
        return $this->textTiles;
    }

    /**
     * Returns the start Tile
     * @return StartTile
     * @throws \Exception
     */
    public function getStart()
    {
        foreach ($this->tiles as $row) {

            foreach ($row as $tile) {

                if ($tile instanceof StartTile) {
                    return $tile;
                }
            }
        }

        throw new \Exception('Labyrinth does not contain a start point.');
    }

    /**
     * Return all possible steps from given base tile
     * @param Tile $baseTile
     * @param int $counter
     * @return Tile[]
     */
    public function getPossiblePaths(Tile $baseTile, $counter = 0)
    {
        $paths = array();

        if ($baseTile->getTopWall() === false) {

            $tile = $this->tiles[$baseTile->getY()-2][$baseTile->getX()];
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getRightWall() === false) {

            $tile = $this->tiles[$baseTile->getY()][$baseTile->getX()+2];
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getBottomWall() === false) {

            $tile = $this->tiles[$baseTile->getY()+2][$baseTile->getX()];
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getLeftWall() === false) {

            $tile = $this->tiles[$baseTile->getY()][$baseTile->getX()-2];
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        return $paths;
    }

    /**
     * Marks winning tiles with 'winner' flag
     * @param Tile $tile
     * @return $this
     */
    public function markWinningPath(Tile $tile)
    {
        $tile->setWinner(true);
        $paths = $this->getPossiblePaths($tile, $tile->getCounter() - 1);

        foreach ($paths as $path) {
            $this->markWinningPath($path);
        }

        return $this;
    }

    /**
     * Returns a Tile object for given coordinates
     * @param int $y
     * @param int $x
     * @return Tile
     */
    public function getTile($y, $x)
    {
        return $this->tiles[$y][$x];
    }
}