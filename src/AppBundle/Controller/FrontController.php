<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    protected $keys;

    public function __construct() {
        $this->keys = ['name', 'city', 'job_title', 'description'];
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('front/index.html.twig', [
            'content'  => $this->getContent(),
        ]);
    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projectsAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findAll();

        return $this->render('front/projects.html.twig', [
            'content'  => $this->getContent(),
            'projects' => $projects
        ]);
    }

    private function getContent()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Content')->getByKeys($this->keys);
    }
}
