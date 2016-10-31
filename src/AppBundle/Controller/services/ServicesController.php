<?php


namespace AppBundle\Controller\services;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends Controller {

    /**
     * @Route("/services", name="liste_services")
     */
    public function serviceListeAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $servicesValides = $repo->findBy(array('valide'=>'1'));
        if(!$servicesValides){
            $php_errormsg ="Aucun service  validé par l'Administrateur pour le moment";
            return $this->render('error-404.html.twig',['error'=>$php_errormsg]);
        }else{
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($servicesValides , $request->query->getInt('page',1),3);
            return $this->render(':service:service_liste.html.twig',['servicesValides'=>$pagination]);
        }
    }

    /**
     * @Route("/services/{slug}",name="show_service")
     */
    public  function showAction($slug)
    {

    }

    /**
     * @Route("/services/ajout",name="service_ajout")
     */
    public function addServiceAction(Request $request)
    {

    }

    /**
     * @Route("/service/update/{slug}",name="service_update")
     */
    public function updateServiceAction()
    {

    }

} 