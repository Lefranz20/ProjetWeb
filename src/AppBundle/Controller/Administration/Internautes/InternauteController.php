<?php

namespace AppBundle\Controller\Administration\Internautes;

use AppBundle\Entity\Internaute;
use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Internaute controller.
 *
 * @Route("/internaute")
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 */
class InternauteController extends Controller
{
    /**
     * Finds and displays a internaute entity.
     *
     * @Route("/{internauteSlug}", name="internaute_show")
     * @Method("GET")
     */
    public function showAction(Internaute $internaute)
    {
        $deleteForm = $this->createDeleteForm($internaute);

        return $this->render(':administration/internaute:show.html.twig', array(
            'internaute' => $internaute,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a new internaute entity.
     *
     * @Route("{userSlug}/new", name="internaute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Utilisateur $utilisateur)
    {
        $internaute = new Internaute();
        $form = $this->createForm('AppBundle\Form\InternauteType', $internaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $internaute->setUtilisateurs($utilisateur);
            $em->persist($internaute);
            $em->flush($internaute);

            return $this->redirectToRoute('internaute_show', array('internauteSlug' => $internaute->getInternauteSlug()));
        }

        return $this->render(':administration/internaute:new.html.twig', array(
            'internaute' => $internaute,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing internaute entity.
     *
     * @Route("/{internauteSlug}/edit", name="internaute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Internaute $internaute)
    {
        $deleteForm = $this->createDeleteForm($internaute);
        $editForm = $this->createForm('AppBundle\Form\InternauteType', $internaute);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('internaute_show', array('internauteSlug' => $this->get('app.functions.annuaire')->RetrieveSlug()));
        }

        return $this->render(':administration/internaute:edit.html.twig', array(
            'internaute' => $internaute,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }




    /**
     * Lists all internaute entities.
     *
     * @Route("/", name="internaute_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $internautes = $em->getRepository('AppBundle:Internaute')->findAll();

        return $this->render(':administration/internaute:index.html.twig', array(
            'internautes' => $internautes,
        ));
    }


    /**
     * Deletes a internaute entity.
     *
     * @Route("/{internauteSlug}", name="internaute_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Internaute $internaute)
    {
        $form = $this->createDeleteForm($internaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($internaute);
            $em->flush($internaute);
        }

        return $this->redirectToRoute('internaute_index');
    }

    /**
     * Creates a form to delete a internaute entity.
     *
     * @param Internaute $internaute The internaute entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Internaute $internaute)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('internaute_delete', array('internauteSlug' => $this->get('app.functions.annuaire')->RetrieveSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
