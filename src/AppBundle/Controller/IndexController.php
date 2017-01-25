<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ConnexionData;
use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render('::Index.html.twig');
    }
    /**
     * @Route("/apropos",name="apropos")
     */
    public function aproposAction()
    {
        return $this->render(':apropos:apropos.html.twig');
    }

    /**
     * @Route("/contact",name="contact")
     */
    public function contactAction()
    {
        return $this->render(':contact:contact.html.twig');
    }



    /* ================== ci-dessous les 4 blocs d'infos qui composent la page d'accueil ================== */

    /*
     *  1. ---------------- le bloc bandeau ou Slider -----------------
     */
    public function  bandeauAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $images = $repo->findBy(array('slider'=>true));
        if(!$images){
            $php_errormsg = ['msg'=>'les images du slider sont en cours de validation !'];
            return $this->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);
        }else{
            return $this->render(':blocs_home:bandeau.html.twig',['sliders'=> $images]);
        }

    }

    /*
    *  2. ---------------- le bloc Recherche ----------------------------
    */

    /**
     * @Route("/search" , name="search_homepage")
     */
    public function rechercheAction(Request $request)
    {

        $userPrestataires = $this->getDoctrine()->getRepository('AppBundle:Prestataire')->FindByService();

        if(!$userPrestataires)
        {
            $php_errormsg = ['msg'=>'le compte des prestataires sont en cours de validation !'];
            return $this->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);
        }
        else {
            return $this->render(':blocs_home:recherche.html.twig', ['usersPrestataires' => $userPrestataires]);
        }

    }

    /**
     * @Route("/search-result",name="search_result_homepage")
     *
     */
    public function rechercheResultatAction(Request $request)
    {

        $recherche = array();
        //if($request->isXmlHttpRequest()){
        if($request->isMethod("POST")){
            $prestataire = $request->get('prestataire', null);
            $localite = $request->get('localite', null);
            $catServices = $request->get('catServices', null);

            if($prestataire){
                $resultatRecherche = $this->getDoctrine()->getRepository('AppBundle:Prestataire')->FindByService($prestataire);
                // return $this->json($resultatRecherche);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($resultatRecherche,$request->query->getInt('page',1),3);
                return $this->render(':s:serviceByPrestataireListe.html.twig',['resultatRecherche'=>$pagination]);
            }
            if($localite){
                $resultatRecherche = $this->getDoctrine()->getRepository('AppBundle:Utilisateur')->FindUserByLocalite('prestataire',$localite);
                // return $this->json($resultatRecherche);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($resultatRecherche,$request->query->getInt('page',1),3);
                return $this->render(':s:prestataireByLocaliteListe.html.twig',['resultatRecherche'=>$pagination]);
            }
            if($catServices){
                $resultatRecherche = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService')->findPrestataireByServices($catServices);
                // return $this->json($resultatRecherche);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($resultatRecherche,$request->query->getInt('page',1),3);
                return $this->render(':s:prestataireByServiceListe.html.twig',['resultatRecherche'=>$pagination]);
            }


        }
        return $this->render('::Index.html.twig');
    }


    /*
    *  3. ---------------- le bloc Prestataires (4 derniers prestataires)--
    */
    public  function prestatairesAction()
    {

        $prestataires = $this->getDoctrine()->getRepository('AppBundle:Prestataire')->findLastPrestataires();
        if(!$prestataires){
            $php_errormsg =['msg'=>'les derniers prestataires inscrits sont en cours de validation !'];
            return $this ->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);

        }else{
            return $this->render(':blocs_home:prestataires.html.twig',array('prestaires'=>$prestataires));
        }

    }

    /*
    *  4. ---------------- le bloc service du Mois ou service à la UNE ----------------------------
    */
    public function serviceDuMoisAction()
    {

        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $serviceDuMois = $repo->findOneBy(array('enAvant'=>'1'));
        if(!$serviceDuMois){
            $php_errormsg = ['msg'=>'le service du mois est en cours de validation !'];
            return $this->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);
        }else{
            return $this->render(':blocs_home:service.html.twig',['serviceDuMois'=>$serviceDuMois]);
        }


    }
    /* ======================================= FIN ============================================================ */



}
