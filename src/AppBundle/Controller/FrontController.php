<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $content = $this->getDoctrine()->getRepository('AppBundle:Content')->getByKeys(['name', 'city', 'job_title']);

        return $this->render('front/index.html.twig', [
            'content' => $content
        ]);
    }
}
