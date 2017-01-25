<?php

namespace AppBundle\Controller\promotions;

use AppBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Promotion controller.
 *
 * @Route("promotion")
 */
class PromotionController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     * @Route("/", name="promotion_index_front")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();

        return $this->render('promotion/index.html.twig', array(
            'promotions' => $promotions,
        ));
    }

    /**
     * Finds and displays a promotion entity.
     *
     * @Route("/{id}", name="promotion_show_front")
     * @Method("GET")
     */
    public function showAction(Promotion $promotion)
    {

        return $this->render('promotion/show.html.twig', array(
            'promotion' => $promotion,
        ));
    }
}
