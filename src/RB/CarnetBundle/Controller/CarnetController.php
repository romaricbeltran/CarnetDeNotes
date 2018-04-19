<?php

namespace RB\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarnetController extends Controller
{
    public function indexAction()
    {
        return $this->render('RBCarnetBundle:Carnet:index.html.twig');
    }
}
