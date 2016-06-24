<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $keys = ['name', 'city', 'job_title', 'description'];
        $content = $this->getDoctrine()->getRepository('AppBundle:Content')->getByKeys($keys);

        return $this->render('front/index.html.twig', [
            'content' => $content
        ]);
    }
}
