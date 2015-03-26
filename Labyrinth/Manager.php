<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Factory\TileFactory;
use Ps\LabyrinthBundle\Model\Labyrinth;
use Ps\LabyrinthBundle\Model\StartTile;
use Ps\LabyrinthBundle\Model\Tile;

/**
 * Class Manager
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Manager
{
    /**
     * @var array
     */
    private $textTiles;

    /**
     * @var TileFactory
     */
    private $tileFactory;

    /**
     * @param TileFactory $tileFactory
     */
    public function __construct(TileFactory $tileFactory)
    {
        $this->tileFactory = $tileFactory;
    }

    /**
     * Returns the start Tile
     * @param Labyrinth $labyrinth
     * @return StartTile
     * @throws \Exception
     */
    public function getStart(Labyrinth $labyrinth)
    {
        foreach ($labyrinth->getTiles() as $tile) {

            if ($tile instanceof StartTile) {
                return $tile;
            }
        }

        throw new \Exception('Labyrinth does not contain a start point.');
    }

    /**
     * Return all possible steps from given base tile
     * @param Labyrinth $labyrinth
     * @param Tile $baseTile
     * @param int $counter
     * @return Tile[]
     */
    public function getPossiblePaths(Labyrinth $labyrinth, Tile $baseTile, $counter = 0)
    {
        $paths = array();

        if ($baseTile->getTopWall() === false) {

            $tile = $this->getTile($labyrinth, $baseTile->getY()-2, $baseTile->getX());
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getRightWall() === false) {

            $tile = $this->getTile($labyrinth, $baseTile->getY(), $baseTile->getX()+2);
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getBottomWall() === false) {

            $tile = $this->getTile($labyrinth, $baseTile->getY()+2, $baseTile->getX());
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        if ($baseTile->getLeftWall() === false) {

            $tile = $this->getTile($labyrinth, $baseTile->getY(), $baseTile->getX()-2);
            if ($tile->getCounter() === $counter) {
                $paths[] = $tile;
            }
        }

        return $paths;
    }

    /**
     * Marks winning tiles with 'winner' flag
     * @param Labyrinth $labyrinth
     * @param Tile $tile
     * @return $this
     */
    public function markWinningPath(Labyrinth $labyrinth, Tile $tile)
    {
        $tile->setWinner(true);
        $paths = $this->getPossiblePaths($labyrinth, $tile, $tile->getCounter() - 1);

        foreach ($paths as $path) {
            $this->markWinningPath($labyrinth, $path);
        }

        return $this;
    }

    /**
     * Returns a Tile object for given coordinates
     * @param Labyrinth $labyrinth
     * @param int $y
     * @param int $x
     * @throws \Exception
     * @return Tile
     */
    public function getTile(Labyrinth $labyrinth, $y, $x)
    {
        foreach ($labyrinth->getTiles() as $tile) {

            if ($tile->getX() == $x && $tile->getY() == $y) {

                return $tile;
            }
        }

        throw new \Exception('Tile with coordinates [' . $x . ', ' . $y . '] doesn\'t exist.');
    }

    /**
     * @param Labyrinth $labyrinth
     * @param array $tiles
     * @return $this
     */
    public function setTextTiles(Labyrinth $labyrinth, array $tiles)
    {
        $this->textTiles = $tiles;
        $tilesSet = array();

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

                $tilesSet[] = $tile;
            }
        }

        $labyrinth->setTiles($tilesSet);

        return $this;
    }

    /**
     * Getter for text tiles
     * @return array
     */
    public function getTextTiles()
    {
        return $this->textTiles;
    }
} 