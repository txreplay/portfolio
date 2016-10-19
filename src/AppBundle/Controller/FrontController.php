<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

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
            'content'  => $this->getContent(),
            'success'  => $success,
            'form' => $form->createView()
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
