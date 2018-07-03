<?php

namespace Voiture\ListeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiture\ListeBundle\Entity\user;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /*
        * READ SIMPLE
        */
    	$liste = $this->getDoctrine()->getRepository('VoitureListeBundle:user')->findAll();
        return $this->render('VoitureListeBundle:Default:index.html.twig',array('liste' => $liste));
    }

    public function editAction(Request $req)
    {
        /*
        * **********
        */
    	$id = $req->query->get('id');
    	$user = $this->getDoctrine()->getRepository('VoitureListeBundle:user')->find($id);
        return $this->render('VoitureListeBundle:Default:edit.html.twig',array('user' => $user));
    }

    public function saveAction(Request $req)
    {
        /*
        * INSERT SIMPLE
        */
        $user = $this->getDoctrine()->getRepository('VoitureListeBundle:user');
        $nom = $req->request->get('nom');
        $mp = $req->request->get('mp');

        $user = new user();
        $user->setNom($nom);
        $user->setPassword($mp);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('voiture_liste_homepage');
    }

    public function updateAction(Request $req)
    {
        /*
        * UPDATE SIMPLE
        */
        $nom = $req->request->get('nom');
        $mp = $req->request->get('mp');
        $id = $req->request->get('id');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('VoitureListeBundle:user')->find($id);
        $user->setNom($nom);
        $user->setPassword($mp);
        $em->flush();
        return $this->redirectToRoute('voiture_liste_homepage');
    }

    public function deleteAction(Request $req)
    {
        /*
            * DELETE SIMPLE QUERY
        */
        $id = $req->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('VoitureListeBundle:user')->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('voiture_liste_homepage');
    }
}
