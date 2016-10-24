<?php

namespace AppBundle\Controller\prestataires;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class PrestatairesController extends Controller {

    /**
     * @Route("/prestataires",name="liste_prestataire")
     */
    public function listAction()
    {
        return $this->render('list.html.twig');
    }

    /**
     * @Route("/prestataire/{slug}",name="show_prestaire")
     */
    public function showAction($slug)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $pretataire = $repo->findOneBy(array('slug'=>$slug));
        if(!$pretataire){
            $error = array('msg'=>'pas de détail pour ce prestataire.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':prestataire:show.html.twig');
        }
    }

    /**
     * @Route("/prestataire/ajout/{prestataireId}" , name="add_prestataire")
     */
    public function addAction($prestataireId)
    {
        return $this->render(':prestataire:add.html.twig');
    }

    /**
     * @Route("/prestataire/update/{prestataireId}")
     */
    public function updateAction($prestataireId)
    {
        return $this->render(':prestataire:update.html.twig');
    }
} 