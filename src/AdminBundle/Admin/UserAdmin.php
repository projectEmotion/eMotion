<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof User
            ? $object->getTitle()
            : 'User'; // shown in the breadcrumb on the create view
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('username','text');
        $formMapper->add('email','text');
        $formMapper->add('password','text');
        $formMapper->add('adress','text');
        $formMapper->add('phone','text');
        $formMapper->add('codePostal','text');
        $formMapper->add('Ville','text');
        $formMapper->add('numberLicence','text');
        $formMapper->add('dateOfBirth','date',array('years' => range(1930,date('Y'))));

    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('password');
        $listMapper->addIdentifier('adress');
        $listMapper->addIdentifier('phone');
        $listMapper->addIdentifier('codePostal');
        $listMapper->addIdentifier('Ville');
        $listMapper->addIdentifier('numberLicence');
        $listMapper->addIdentifier('dateOfBirth');
        $listMapper->addIdentifier('id');
    }
}
