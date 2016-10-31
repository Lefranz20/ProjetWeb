<?php

namespace AppBundle\Controller\prestataires;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class PrestatairesController extends Controller {


    /**
     * @Route("/prestataires",name="liste_prestataires")
     */
    public function prestataireListeAction(Request $request){
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $prestataires = $repo->findAll();
        if(!$prestataires){
            $error = array('msg'=>'aucun prestataire trouvé.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($prestataires, $request->query->getInt('page', 1),3);
            return $this->render(':prestataire:prestataire_liste.html.twig',['prestataires'=>$pagination]);
        }
    }

    /**
     * @Route("/prestataires/{slug}",name="show_prestaire")
     */
    public function showAction($slug)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $pretataire = $repo->findOneBy(array('slug'=>$slug));
        if(!$pretataire){
            $error = array('msg'=>'pas de détail pour ce prestataire.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':prestataire:prestataire_show.html.twig',['prestataire'=>$pretataire]);
        }
    }

    /**
     * @Route("/prestataires/ajout" , name="prestataire_add")
     */
    public function addAction(Request $request)
    {
        return $this->render(':prestataire:prestataire_add.html.twig');
    }

    /**
     * @Route("/prestataires/update/{slug}")
     */
    public function updateAction($slug)
    {
        return $this->render('prestataire_update.html.twig');
    }
} 