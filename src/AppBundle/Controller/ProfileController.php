<?php



namespace AppBundle\Controller;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;


class ProfileController extends BaseController
{

    public function editAction(Request $request)
    {
      return parent::editAction($request);
    }
}
