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

        return $this->render('::Index.html.twig');
    }
    /**
     * @Route("/apropos",name="apropos")
     */
    public function aproposAction(){
        return $this->render(':apropos:apropos.html.twig');
    }

    /**
     * @Route("/contact",name="contact")
     */
    public function contactAction(){
        return $this->render(':contact:contact.html.twig');
    }



    /* ================== ci-dessous les 4 blocs d'infos qui composent la page d'accueil ================== */

    /*
     *  1. ---------------- le bloc bandeau ou Slider -----------------
     */
    public function  bandeauAction(){
        return $this->render(':blocs_home:bandeau.html.twig');
    }

    /*
    *  2. ---------------- le bloc Recherche ----------------------------
    */
    public function rechercheAction(){
        $repo = $this->getDoctrine()->getRepository('AppBundle:Utilisateur');
        $utilisateurs = $repo->findBy(array('typeUtilisateur'=>'prestataire'));
        if(!$utilisateurs){
            /*message d'erreur*/
        }else {
            return $this->render(':blocs_home:recherche.html.twig', ['users' => $utilisateurs]);
        }
    }

    /*
    *  3. ---------------- le bloc Prestataires (4 derniers prestataires)--
    */
    public  function prestatairesAction(){

        $prestataires = $this->getDoctrine()->getRepository('AppBundle:Prestataire')->findLastPrestataires();
        return $this->render(':blocs_home:prestataires.html.twig',array('prestaires'=>$prestataires));
    }

    /*
    *  4. ---------------- le bloc service du Mois ou service à la UNE ----------------------------
    */
    public function serviceDuMoisAction(){

        $repo = $this->getDoctrine()->getRepository('AppBundle:CategorieDeService');
        $serviceDuMois = $repo->findOneBy(array('enAvant'=>'1'));

        return $this->render(':blocs_home:service.html.twig',['serviceDuMois'=>$serviceDuMois]);

    }
    /* ======================================= FIN ============================================================ */
}
