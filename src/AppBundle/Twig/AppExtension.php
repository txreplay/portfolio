<?php

namespace AppBundle\Twig;

use Doctrine\ORM\EntityManager;

class AppExtension extends \Twig_Extension
{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('raw_desc', [$this, 'rawDescFilter'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getContent', [$this, 'getContentFilter']),
        ];
    }

    public function rawDescFilter($desc)
    {
        return $desc;
    }

    public function getContentFilter()
    {
        $contents_obj = $this->em->getRepository('AppBundle:Content')->findAll();
        $content = [];

        foreach($contents_obj as $contents){
            $content[$contents->getKey()] = $contents->getValue();
        }

        return $content;
    }

    public function getName()
    {
        return 'app_extension';
    }
}
