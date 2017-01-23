<?php

namespace AppBundle\Controller\Utilisateur;


use AppBundle\Entity\Utilisateur;
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
    /*
     *
        vérifications des données et profils des utilsateurs
        permet d'afficher dans la vue la navigation Utilisateur en fonction du type d'utilisateur
    */

    /**
     * @Route("/home",name="user_home")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function homeAction(Request $request)
    {

        $currentUser = $this->getUser()->getUtilisateurs();
       // dump($currentUser);die();
        if($currentUser)
        {
           //dump($this->get('app.functions.annuaire')->RetrieveSlug());die();
            if($this->get('app.functions.annuaire')->RetrieveSlug())
            {
                return $this->render('::Index.html.twig');
            }
            if($currentUser->getTypeUtilisateur()=== "prestataire")
            {
                return $this->redirectToRoute('new_prestataire',array('userSlug'=>$currentUser->getUserSlug()));
            }
            if($currentUser->getTypeUtilisateur()=== "internaute")
            {

                return $this->redirectToRoute('internaute_new',array('userSlug'=>$currentUser->getUserSlug()));
            }

        }
        return $this->redirectToRoute('new_utilisateur');

    }

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
     * Finds and displays a utilisateur entity.
     *
     *@Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *@Route("/{userSlug}", name="utilisateur_show")
     *
     */

    public function showAction(Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);

        return $this->render('utilisateur/show.html.twig', array(
            'utilisateur' => $utilisateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing utilisateur entity.
     *
     * @Route("/{userSlug}/edit", name="utilisateur_edit")
     * @Method({"GET", "POST"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     */
    public function editAction(Request $request, Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);
        $editForm = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        $editForm->remove('typeUtilisateur'); /* enleve le champ type d'utilisateur lorsqu'on souhaite mettre à jour ses données*/
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_show', array('userSlug' => $utilisateur->getUserSlug()));
        }

        return $this->render(':utilisateur:edit.html.twig', array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a utilisateur entity.
     *
     * @Route("/{userSlug}", name="utilisateur_delete")
     * @Method("DELETE")
     */

    public function deleteAction(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createDeleteForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateur);
            $em->flush($utilisateur);
        }

        return $this->redirectToRoute('homepage');
    }


    /**
     * Creates a form to delete a utilisateur entity.
     *
     * @param Utilisateur $utilisateur The utilisateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */

    private function createDeleteForm(Utilisateur $utilisateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('userSlug' => $utilisateur->getUserSlug())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


    /**
     * @Route("/localite", name="ajax_localite", methods={"POST"})
     *
     */
    /*
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
    */

}
