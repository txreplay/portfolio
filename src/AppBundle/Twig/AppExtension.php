<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('raw_desc', [$this, 'rawDescFilter'], ['is_safe' => ['html']]),
        ];
    }

    public function rawDescFilter($desc)
    {
        return $desc;
    }

    public function getName()
    {
        return 'app_extension';
    }
}