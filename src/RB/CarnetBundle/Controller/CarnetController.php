<?php

namespace RB\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RB\CarnetBundle\Entity\Eleve;
use RB\CarnetBundle\Entity\Note;

class CarnetController extends Controller
{
    public function indexAction()
    {
        $em    = $this->getDoctrine()->getManager();

        $eleve = new Eleve();
        $eleve->setPrenom('Romaric');
        $eleve->setNom('Beltran');
        $eleve->setDateNaissance(new \DateTime('1995-12-01'));


        $em->persist($eleve);

        $em->flush();

        $repository = $em->getRepository('RBCarnetBundle:Eleve');

        $listEleves = $repository->findAll();

        return $this->render('RBCarnetBundle:Carnet:index.html.twig', array(
            'listEleves' => $listEleves
        ));
    }
}
