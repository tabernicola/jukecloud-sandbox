<?php

namespace Tabernicola\JukeCloudAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TabernicolaJukeCloudAdminBundle:admin:index.html.twig');
    }
}
