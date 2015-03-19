<?php
namespace Ps\LabyrinthBundle\Labyrinth;

/**
 * Class Solver
 * @package Ps\LabyrinthBundle\Labyrinth
 */
class Solver
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @param Reader $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function solve($filePath)
    {
        $labyrinthArray = $this->reader->getLabyrinthArray($filePath);
        print '<pre>';
        print_r($labyrinthArray);
        print '</pre>';
    }
} 