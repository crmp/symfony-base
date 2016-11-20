<?php

namespace Crmp\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Main controller.
 *
 * Runs when entering the site.
 *
 * @package Crmp\BaseBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * Just hello world.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('CrmpBaseBundle:Default:index.html.twig');
    }
}
