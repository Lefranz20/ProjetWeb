<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Session\Session;


class RegistrationController extends  BaseController {
    public function registerAction(Request $request)
    {

        return parent::registerAction($request);

    }

    public function confirmedAction()
    {
        return $this->redirectToRoute('new_utilisateur');
    }
}