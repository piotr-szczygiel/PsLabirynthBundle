<?php
namespace Ps\LabyrinthBundle\Labyrinth;

use Ps\LabyrinthBundle\Model\Labyrinth;
use Ps\LabyrinthBundle\Factory\TileFactory;

/**
 * Class Reader
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Reader
{
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
     * Reads given file and returns a Labyrinth model object
     * @param string $filePath
     * @return Labyrinth
     */
    public function getLabyrinth($filePath)
    {
        $tiles = array();
        $fileContent = file($filePath);

        foreach($fileContent as $line) {
            $tiles[] = trim($line);
        }

        $labyrinth = new Labyrinth($this->tileFactory);
        $labyrinth->setTiles($tiles);

        return $labyrinth;
    }
} 