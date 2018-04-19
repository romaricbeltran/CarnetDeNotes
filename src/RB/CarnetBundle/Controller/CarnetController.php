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

        $note1 = new Note();
        $note1->setMatiere('Francais');
        $note1->setChiffre('15');
        $note1->setEleve($eleve);

        $note2 = new Note();
        $note2->setMatiere('Math');
        $note2->setChiffre('10');
        $note2->setEleve($eleve);

        $em->persist($eleve);

        $em->persist($note1);
        $em->persist($note2);

        $em->flush();

        $listEleves = $em->getRepository('RBCarnetBundle:Eleve')->findAll();

        $listNotes  = $em->getRepository('RBCarnetBundle:Note')->findBy(array('eleve' => $listEleves));

        return $this->render('RBCarnetBundle:Carnet:index.html.twig', array(
            'listEleves' => $listEleves,
            'listNotes'  => $listNotes
        ));
    }
}
