<?php

namespace AppBundle\Controller\prestataires;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class PrestatairesController extends Controller {

    /**
     * @Route("/prestataires",name="listes_prestataires")
     */
    public function listAction(){
        return $this->render(':prestataire:listing.html.twig');

    }
    /**
     * @Route("/prestataires/{prestataireId}",name="detail_prestaire")
     */
    public function detailAction($prestataireId){
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $pretataire = $repo->find($prestataireId);
        if(!$pretataire){
            $error = array('msg'=>'pas de détail pour ce prestataire.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':prestataire:listing-detail.html.twig');
        }
    }
} 