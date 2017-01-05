<?php

namespace AppBundle\Controller\Internautes;

use AppBundle\Entity\Internaute;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Internaute controller.
 *
 * @Route("internaute")
 */
class InternauteController extends Controller
{
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

        return $this->render('internaute/index.html.twig', array(
            'internautes' => $internautes,
        ));
    }

    /**
     * Creates a new internaute entity.
     *
     * @Route("/new", name="internaute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $internaute = new Internaute();
        $form = $this->createForm('AppBundle\Form\InternauteType', $internaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($internaute);
            $em->flush($internaute);

            return $this->redirectToRoute('internaute_show', array('id' => $internaute->getId()));
        }

        return $this->render('internaute/new.html.twig', array(
            'internaute' => $internaute,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a internaute entity.
     *
     * @Route("/{id}", name="internaute_show")
     * @Method("GET")
     */
    public function showAction(Internaute $internaute)
    {
        $deleteForm = $this->createDeleteForm($internaute);

        return $this->render('internaute/show.html.twig', array(
            'internaute' => $internaute,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing internaute entity.
     *
     * @Route("/{id}/edit", name="internaute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Internaute $internaute)
    {
        $deleteForm = $this->createDeleteForm($internaute);
        $editForm = $this->createForm('AppBundle\Form\InternauteType', $internaute);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('internaute_edit', array('id' => $internaute->getId()));
        }

        return $this->render('internaute/edit.html.twig', array(
            'internaute' => $internaute,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a internaute entity.
     *
     * @Route("/{id}", name="internaute_delete")
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
            ->setAction($this->generateUrl('internaute_delete', array('id' => $internaute->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
