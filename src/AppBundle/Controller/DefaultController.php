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


    /**
     * @Route("/prestaires/listes",name="prestataires_liste")
     */
    public function prestataireListeAction(){
        $repo = $this->getDoctrine()->getRepository('AppBundle:Prestataire');
        $prestataires = $repo->findAll();
        if(!$prestataires){
            $error = array('msg'=>'aucun prestataire trouvé.');
            return $this->render('error-404.html.twig',['error'=>$error]);
        }else{
            return $this->render(':prestataire:list.html.twig',['prestataires'=>$prestataires]);
        }
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
        return $this->render(':blocs_home:recherche.html.twig');
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
