<?php

namespace RB\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use RB\CarnetBundle\Form\AjoutEleveType;
use RB\CarnetBundle\Form\ModifEleveType;
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

        $form  = $this->get('form.factory')->create(AjoutEleveType::class, $eleve);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Nouvel élève enregistré.');

            return $this->redirectToRoute('rb_carnet_home');
        }

        return $this->render('RBCarnetBundle:Carnet:ajoutEleve.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function modifEleveAction(Eleve $eleve, Request $request)
    {
        $form = $this->get('form.factory')->create(ModifEleveType::class, $eleve);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

          $em = $this->getDoctrine()->getManager();

          //on ne persiste pas l'annonce est déja en bdd
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Eleve modifié.');
          return $this->redirectToRoute('rb_carnet_home', array('id' => $eleve->getId()));
      }


      return $this->render('RBCarnetBundle:Carnet:modifEleve.html.twig', array(
        'eleve' => $eleve,
        'form' => $form->createView(),
    ));
  }
}
