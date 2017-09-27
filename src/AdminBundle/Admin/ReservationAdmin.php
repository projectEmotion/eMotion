<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReservationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('price','text');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('price');
        $listMapper->addIdentifier('id');
    }
}
