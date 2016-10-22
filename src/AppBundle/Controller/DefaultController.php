<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render('Frontend/Index.html.twig');
    }
    /**
     * @Route("/apropos",name="apropos")
     */
    public function aproposAction(){
        return $this->render('Frontend/apropos.html.twig');
    }

    /**
     * @Route("/contact",name="contact")
     */
    public function contactAction(){
        return $this->render('Frontend/contact.html.twig');
    }

    public function  bandeauAction(){
        return $this->render(':Blocs:bandeau.html.twig');
    }

    public function rechercheAction(){
        return $this->render(':Blocs:recherche.html.twig');
    }
    public  function prestatairesAction(){
        /*
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Prestataire');
        $prestataires = $repo->findLastPrestataires();
        */

        $prestataires = $this->getDoctrine()->getRepository('AppBundle:Prestataire')->findLastPrestataires();
        dump($prestataires);
        return $this->render(':Blocs:prestataires.html.twig',array('prestaires'=>$prestataires));
    }
}
