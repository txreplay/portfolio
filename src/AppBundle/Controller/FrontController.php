<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

//    protected $keys;
//
//    public function __construct() {
//        $this->keys = ['name', 'city', 'job_title', 'description'];
//    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->renderCache('front/index.html.twig', [
            'content'  => $this->getContent(),
        ]);
    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projectsAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findAll();

        return $this->renderCache('front/projects.html.twig', [
            'content'  => $this->getContent(),
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('front/contact.html.twig', [
            'content'  => $this->getContent(),
        ]);
    }

    private function renderCache($template, $output)
    {
        $response = new Response();
        $response->setPublic();
        $response->setMaxAge(60);
        $response->setSharedMaxAge(60);
        $date = new \DateTime();
        $date->modify('+ 60 seconds');
        $response->setExpires($date);
        return $this->render($template, $output, $response);
    }

    private function getContent()
    {
        $contents_obj = $this->getDoctrine()->getRepository('AppBundle:Content')->findAll();
        $content = [];
        foreach($contents_obj as $contents){
            $content[$contents->getKey()] = $contents->getValue();
        }
        return $content;
    }
}
