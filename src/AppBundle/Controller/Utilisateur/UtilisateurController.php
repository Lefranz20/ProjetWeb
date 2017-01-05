<?php

namespace AppBundle\Controller\Utilisateur;


use AppBundle\Entity\Localite;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\ConnexionData;
use AppBundle\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
Use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;


/**
 * Utilisateur controller.
 *
 * @Route("utilisateur")
 */
class UtilisateurController extends Controller
{
    /**
     *@Route("/new",name="new_utilisateur",methods={"POST","GET"})
     *@Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     */
    public function newAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm('AppBundle\Form\UtilisateurType',$utilisateur);
        $form->handleRequest($request);
        $utilisateur->setConnexionDatas($this->getUser());
        if($form->isSubmitted() && $form->isValid())
        {
            $typeUser = $utilisateur->getTypeUtilisateur();
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();
            if($typeUser === "prestataire")
            {
                return $this->redirectToRoute('new_prestataire',array('userSlug'=>$utilisateur->getUserSlug(),'methods'=>'POST'));
            }elseif($typeUser === "internaute")
            {
                return $this->redirectToRoute('internaute_new',array('userSlug'=>$utilisateur->getUserSlug(),'methods'=>'POST'));
            }
        }
        return $this->render(':utilisateur:new.html.twig',array('Utilisateur'=> $utilisateur, 'form'=>$form->createView()));

    }

    /**
     * @Route("/localite", name="ajax_localite", methods={"POST"})
     *
     */
    public function findLocaliteByCodePostalAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $codepostal = $request->get('CodePostalId');
            $em = $this->getDoctrine();
            $repo = $em->getRepository('AppBundle:Localite');
            $localites = $repo->findBy(array('codePostal'=>$codepostal));
            $response = new Response();
            return $response->sendContent(json_encode($localites));
        }
    }

}
