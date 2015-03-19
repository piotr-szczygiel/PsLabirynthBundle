<?php

namespace Ps\LabyrinthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PsLabyrinthBundle:Default:index.html.twig', array('name' => $name));
    }
}
