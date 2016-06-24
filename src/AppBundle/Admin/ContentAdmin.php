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
            ->addIdentifier('key', null, [
                'label' => 'Clé',
            ])
            ->add('value', null, [
                'label' => 'Valeur',
                'template' => 'admin/content/list_value.html.twig'
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
            ])
            ->add('value', 'textarea', [
                'label' => 'Valeur',
                'attr' => [
                    'class' => 'ckeditor'
                ],
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
            ])
            ->add('value', null, [
                'label' => 'Valeur',
            ])
        ;
    }
}