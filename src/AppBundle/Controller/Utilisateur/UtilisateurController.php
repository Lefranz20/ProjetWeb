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





    /**
     * Lists all utilisateur entities.
     *
     * @Route("/", name="utilisateur_index")
     * @Method("GET")
     */

    /*
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateurs = $em->getRepository('AppBundle:Utilisateur')->findAll();

        return $this->render('utilisateur/index.html.twig', array(
            'utilisateurs' => $utilisateurs,
        ));
    }

    */

    /**
     * Creates a new utilisateur entity.
     *
     * @Route("/new", name="utilisateur_new")
     * @Method({"GET", "POST"})
     */

    /*
    public function newAction(Request $request)
    {
        //$utilisateur = new Utilisateur();
        //$form = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        //$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush($utilisateur);

            return $this->redirectToRoute('utilisateur_show', array('id' => $utilisateur->getId()));
        }

        return $this->render('utilisateur/new.html.twig', array(
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ));
    }

    */

    /**
     * Finds and displays a utilisateur entity.
     *
     * @Route("/{id}", name="utilisateur_show")
     * @Method("GET")
     */
    /*
    public function showAction(Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);

        return $this->render('utilisateur/show.html.twig', array(
            'utilisateur' => $utilisateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    */

    /**
     * Displays a form to edit an existing utilisateur entity.
     *
     * @Route("/{id}/edit", name="utilisateur_edit")
     * @Method({"GET", "POST"})
     *
     */
    /*
    public function editAction(Request $request, Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);
        $editForm = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_edit', array('id' => $utilisateur->getId()));
        }

        return $this->render('utilisateur/edit.html.twig', array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    */

    /**
     * Deletes a utilisateur entity.
     *
     * @Route("/{id}", name="utilisateur_delete")
     * @Method("DELETE")
     */
    /*
    public function deleteAction(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createDeleteForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateur);
            $em->flush($utilisateur);
        }

        return $this->redirectToRoute('utilisateur_index');
    }
       */
    /**
     * Creates a form to delete a utilisateur entity.
     *
     * @param Utilisateur $utilisateur The utilisateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    /*
    private function createDeleteForm(Utilisateur $utilisateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $utilisateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    */

}
