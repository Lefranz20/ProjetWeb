<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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


    /**
     * @Route("/search" , name="search_homepage", methods = {"POST" , "GET"})
     */
    public function searchByAllAction(Request $request)
    {
        $pName = $request->get('prestataire');
        $lName = $request->get('localite');
        $sName = $request->get('catServices');
        $resultat = $this->getDoctrine()->getRepository('AppBundle:Utilisateur')->search('prestataire');
        /* liste des prestataire si et seulement si service  et/ou localité introduits*/
       /* return $this->render(':prestataire:prestataire_liste.html.twig');*/
        /*ensuite vient ici en dessous la liste des service du prestataire si et si prestataire indiqué*/

        /*si les trois champ remplis: on affiche tous les prestataire du service choisi, tous les prestataires
        de la localité choisie et enfin tous les services du prestataire choisi*/
        return $this ->render('contact/contact.html.twig',['resultat'=>$resultat]);
    }






    /* ================== ci-dessous les 4 blocs d'infos qui composent la page d'accueil ================== */

    /*
     *  1. ---------------- le bloc bandeau ou Slider -----------------
     */
    public function  bandeauAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Image');
        $images = $repo->findBy(array('typeImage'=>'slider'));
        if(!$images){
            $php_errormsg = 'Aucune image pour le slider !';
            return $this->render('error-404.html.twig',['error'=>$php_errormsg]);
        }else{
            return $this->render(':blocs_home:bandeau.html.twig',['sliders'=> $images]);
        }

    }

    /*
    *  2. ---------------- le bloc Recherche ----------------------------
    */
    public function rechercheAction()
    {

        /*$utilisateurs = $repo->findBy(array('typeUtilisateur'=>'prestataire'));*/
        $utilisateurs = $this->getDoctrine()->getRepository('AppBundle:Utilisateur')->search("prestataire");
        if(!$utilisateurs){
            $php_errormsg = ['msg'=>'Acun prestataire inscrit pour le moment !'];
            return $this->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);
        }else {
            return $this->render(':blocs_home:recherche.html.twig', ['users' => $utilisateurs]);
        }
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
            $php_errormsg = ['msg'=>'Service du Mois en cours de validation ...'];
            return $this->render(':blocs_home:error-blocs.html.twig',['error'=>$php_errormsg]);
        }else{
            return $this->render(':blocs_home:service.html.twig',['serviceDuMois'=>$serviceDuMois]);
        }


    }
    /* ======================================= FIN ============================================================ */
}
