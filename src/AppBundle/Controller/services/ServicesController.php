<?php


namespace AppBundle\Controller\services;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends Controller {

    /**
     * @Route("/services", name="liste_services_valide")
     */
    public function serviceListeValideAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $servicesValides = $repo->findBy(array('valide'=>'1'));
        if(!$servicesValides){
            $php_errormsg =["msg"=>"Aucun service  validé par l'Administrateur pour le moment"];
            return $this->render('error-404.html.twig',['error'=>$php_errormsg]);
        }else{
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($servicesValides , $request->query->getInt('page',1),3);
            return $this->render(':service:service_liste.html.twig',['servicesValides'=>$pagination]);
        }
    }

    /**
     * @Route("/services/{slug}", name="show_service")
     */
    public  function showAction($slug)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $categService = $repo->findOneBy(array('slug'=>$slug));
        if(!$categService){
            $error = array('msg'=>'pas de détail pour ce service');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':service:service_show.html.twig',['categorieService'=>$categService]);
        }
    }



} 