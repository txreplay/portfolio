<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ContentAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('key', null, [
                'label' => 'Clé',
                'help' => 'Tel qu\'il sera requis dans le code'
            ])
            ->add('label', null, [
                'label' => 'Libellé',
            ])
            ->add('value', null, [
                'label' => 'Valeur',
            ])
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('key', null, [
                'label' => 'Clé',
                'help' => 'Tel qu\'il sera requis dans le code'
            ])
            ->add('label', null, [
                'label' => 'Libellé',
                'help' => 'Ce libellé sera uniquement utilisé pour identifier le contenu dans la liste'
            ])
            ->add('value', 'textarea', [
                'label' => 'Valeur',
                'attr' => [
                    'class' => 'ckeditor'
                ],
                'help' => 'Cette donnée sera celle affichée dans le site'
            ])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('key', null, [
                'label' => 'Clé',
                'help' => 'Tel qu\'il sera requis dans le code'
            ])
            ->add('label', null, [
                'label' => 'Libellé',
            ])
            ->add('value', null, [
                'label' => 'Valeur',
            ])
        ;
    }
}