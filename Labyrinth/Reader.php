<?php
namespace Ps\LabyrinthBundle\Labyrinth;

/**
 * Class Reader
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Reader
{
    /**
     * Reads given file and returns an array
     * @param string $filePath
     * @return array
     */
    public function getLabyrinth($filePath)
    {
        $tiles = array();
        $fileContent = file($filePath);

        foreach($fileContent as $line) {
            $tiles[] = trim($line);
        }

        return $tiles;
    }
} 