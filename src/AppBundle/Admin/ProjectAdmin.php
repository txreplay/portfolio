<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProjectAdmin extends AbstractAdmin
{
    protected $booleanChoices = array(0 => "Non",1 => "Oui");

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, ['label' => 'Project\'s Title' ])
            ->add('type', null, ['label' => 'Project\'s Type'])
            ->add('_action', null, array(
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
            ->with("Create a new project", [])
                    ->add('title', null, ['label' => 'Project\'s Title' ])
                    ->add('published', 'choice',array('label' => "Is published ?", "choices" => $this->booleanChoices))
                    ->add('cover', null, ['label' => 'Project\'s Cover Image'])
                    ->add('type', null, ['label' => 'Project\'s Type'])
                    ->add('creationDate', null, ['label' => 'Project\'s Date'])
                    ->add('description', 'textarea', [
                        'label' => 'Project\'s Description',
                        'attr' => [
                            'class' => 'ckeditor'
                        ]
                    ])
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title', null, ['label' => 'Project\'s Title' ])
            ->add('cover', null, ['label' => 'Project\'s Cover Image'])
            ->add('type', null, ['label' => 'Project\'s Type'])
            ->add('creationDate', null, ['label' => 'Project\'s Date'])
            ->add('description', null, ['label' => 'Description'])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title', null, ['label' => 'Project\'s Title' ])
            ->add('cover', null, ['label' => 'Project\'s Cover Image'])
            ->add('type', null, ['label' => 'Project\'s Type'])
            ->add('creationDate', null, ['label' => 'Project\'s Date'])
            ->add('description', null, ['label' => 'Description'])
        ;
    }
}
