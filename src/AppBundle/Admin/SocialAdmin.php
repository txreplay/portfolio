<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SocialAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('socialNetwork', null, ['label' => 'Réseau social'])
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
            ->add('socialNetwork', null, ['label' => 'Réseau social'])
            ->add('profileUrl', null, ['label' => 'Lien vers le profil'])
            ->add('socialIcon', null, ['label' => 'Url Icone'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('socialNetwork', null, ['label' => 'Réseau social'])
            ->add('profileUrl', null, ['label' => 'Lien vers le profil'])
            ->add('socialIcon', null, ['label' => 'Url Icone'])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('socialNetwork', null, ['label' => 'Réseau social'])
            ->add('profileUrl', null, ['label' => 'Lien vers le profil'])
            ->add('socialIcon', null, ['label' => 'Url Icone'])
        ;
    }
}
