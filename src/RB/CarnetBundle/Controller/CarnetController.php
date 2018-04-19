<?php

namespace RB\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RB\CarnetBundle\Form\EleveType;
use RB\CarnetBundle\Entity\Eleve;
use RB\CarnetBundle\Entity\Note;

class CarnetController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listEleves = $em->getRepository('RBCarnetBundle:Eleve')->findAll();

        return $this->render('RBCarnetBundle:Carnet:index.html.twig', array(
            'listEleves' => $listEleves
        ));
    }

    public function ajoutEleveAction(Request $request)
    {
        $eleve = new Eleve();

        $form  = $this->get('form.factory')->create(EleveType::class, $eleve);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Nouvel Eleve enregistré.');

            return $this->redirectToRoute('rb_carnet_home');
        }

        return $this->render('RBCarnetBundle:Carnet:ajoutEleve.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
