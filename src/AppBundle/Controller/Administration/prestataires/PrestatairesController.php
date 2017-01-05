<?php

namespace AppBundle\Controller\Administration\prestataires;

use AppBundle\Entity\Prestataire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
Use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;


/**
 * Prestataires controller.
 *
 * @Route("/{pretataireSlug}")
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 */
class PrestatairesController extends Controller {

    /**
     * Finds and displays a prestataire entity.
     *
     * @Route("/", name="p_show")
     * @Method("GET")
     */
    public function showAction(Prestataire $prestataire)
    {
        dump($prestataire);
        $deleteForm = $this->createDeleteForm($prestataire);

        return $this->render(':administration/prestataire:show.html.twig', array(
            'prestataire' => $prestataire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing prestataire entity.
     *
     * @Route("/edit", name="p_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Prestataire $prestataire)
    {
        $deleteForm = $this->createDeleteForm($prestataire);
        $editForm = $this->createForm('AppBundle\Form\PrestataireType', $prestataire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('p_show', array('pretataireSlug' => $prestataire->getPretataireSlug()));
        }

        return $this->render(':administration/prestataire:edit.html.twig', array(
            'prestataire' => $prestataire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a prestataire entity.
     *
     * @Route("/delete", name="prestataire_delete")
     * @Method("DELETE")
     */

    public function deleteAction(Request $request,Prestataire $prestataire)
    {
        $form = $this->createDeleteForm($prestataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prestataire);
            $em->flush($prestataire);
        }

        return $this->redirectToRoute('homepage');
    }


    /**
     * Creates a form to delete a prestataire entity.
     *
     * @param Prestataire $prestataire The prestataire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */

    private function createDeleteForm(Prestataire $prestataire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prestataire_delete', array('pretataireSlug' => $prestataire->getPretataireSlug())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}
