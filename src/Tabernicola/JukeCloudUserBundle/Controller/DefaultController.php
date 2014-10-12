<?php

namespace Tabernicola\JukeCloudUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TabernicolaJukeCloudUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
