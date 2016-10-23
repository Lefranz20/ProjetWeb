<?php

namespace AppBundle\Controller\FrontEnd\prestataires;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class PrestatairesController {

    /**
     * @Route("prestataires/list",name="listes-prestataires")
     */
    public function listAction(){

    }
    /**
     * @Route("prestataires/{id}",name="detail-prestaire")
     */
    public function detailAction($id){

    }
} 