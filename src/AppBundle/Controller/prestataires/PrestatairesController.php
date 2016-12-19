<?php

namespace AppBundle\Controller\prestataires;

use AppBundle\Entity\Prestataire;
use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Prestataires controller.
 *
 * @Route("/prestataires")
 */
class PrestatairesController extends Controller {


    /**
     * @Route("/",name="liste_prestataires")
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
     * @Route("/prestataire/{slug}",name="show_prestaire")
     */
    public function showAction($slug)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $pretataire = $repo->findOneBy(array('pretataireSlug'=>$slug));
        if(!$pretataire){
            $error = array('msg'=>'pas de détail pour ce prestataire.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':prestataire:prestataire_show.html.twig',['prestataire'=>$pretataire]);
        }
    }

    /**
     * @Route("/new/{userSlug}" , name="new_prestataire",methods={"POST","GET"})
     * @ParamConverter("user",class="AppBundle:Utilisateur")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function newAction(Request $request, Utilisateur $user)
    {
       // return die($user->getTypeUtilisateur());
        $prestataire = new Prestataire();
        $form = $this->createForm('AppBundle\Form\PrestataireType',$prestataire);
        $form->handleRequest($request);
        $session = $request->getSession();
        $session->set('Prestataire_name',$user->getNom());
        if($form->isSubmitted() && $form->isValid())
        {
            $prestataire->setUtilisateur($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestataire);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render(':prestataire:prestataire_add.html.twig', array('prestataire' => $prestataire,'form'=>$form->createView()));
    }


    /**
     * @Route("/home",name="user_home")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function homeAction(Request $request)
    {

        $userData = $this->getDoctrine()->getRepository('AppBundle:ConnexionData')->findOneBy(array('id'=>$this->getUser()));
        /** @var Utilisateur $u */
        $u = $userData->getUtilisateurs();
        if($u)
        {
            // permet d'afficher dans la vue la navigation Utilisateur en fonction du type d'utilisateur
            return $this->render('::Index.html.twig');

        }
        return $this->redirectToRoute('new_utilisateur');

    }

    /**
     * @Route("/{pretataireSlug}/services",name="nav_prestataire_service")
     * @ParamConverter("p",class="AppBundle:Prestataire")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     */
    public function AdminServiceByPrestataire(Request $request, Prestataire $p)
    {
        return die($p->getNomEntreprise());
    }


}
