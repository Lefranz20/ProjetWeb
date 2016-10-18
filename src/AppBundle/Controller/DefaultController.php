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
        return $this->render('includes/bandeau.html.twig');
    }
}
