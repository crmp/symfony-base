<?php

namespace Crmp\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrmpBaseBundle:Default:index.html.twig');
    }
}
