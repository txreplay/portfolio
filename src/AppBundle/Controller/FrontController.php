<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @Method({"GET"})
     * @Cache(expires="+ 60 seconds", smaxage="60", maxage="60")
     */
    public function indexAction()
    {
        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/projets", name="projects")
     * @Method({"GET"})
     * @Cache(expires="+ 60 seconds", smaxage="60", maxage="60")
     */
    public function projectsAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findAll();

        return $this->render('front/projects.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/projet/{slug}", name="project_single")
     * @Method({"GET"})
     * @Cache(expires="+ 60 seconds", smaxage="60", maxage="60")
     */
    public function projectSingleAction($slug)
    {
        $project = $this->getDoctrine()->getRepository('AppBundle:Project')->findOneBy(['slug' => $slug]);

        return $this->render('front/project_single.html.twig', [
            'project' => $project
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @Method({"GET", "POST"})
     */
    public function contactAction(Request $request)
    {
        $success = false;

        $form = $this->createForm(ContactType::class,null,array(
            'action' => $this->generateUrl('contact'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if($form->isValid()){
                $this->sendEmail($form->getData());
                $success = true;
            }
        }

        return $this->render('front/contact.html.twig', [
            'success'  => $success,
            'form' => $form->createView()
        ]);
    }

    private function sendEmail($data){
        $message = \Swift_Message::newInstance()
            ->setSubject('[txreplay.fr] '. $data['name'] . ' vous a laissé un message')
            ->setFrom($this->getParameter('mail_from'))
            ->setTo($this->getParameter('mail_to'))
            ->setBody(
                $this->renderView(
                    'emails/email_contact.html.twig', [
                        'data' => $data
                    ]
                ),
                'text/html'
            );

        $this->get('mailer')->send($message);
    }
}
