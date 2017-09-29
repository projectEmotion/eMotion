<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

class UserAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof User
            ? $object->getUsername()
            : 'User'; // shown in the breadcrumb on the create view
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('username','text');
        $formMapper->add('email','text');
        //$formMapper->add('password','text');
        $formMapper->add('adress','text');
        $formMapper->add('phone','text');
        $formMapper->add('codePostal','text');
        $formMapper->add('Ville','text');
        $formMapper->add('numberLicence','text');
        $formMapper->add('dateOfBirth','date',array('years' => range(1930,date('Y'))));

    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->addIdentifier('username');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('adress');
        $listMapper->addIdentifier('phone');
        $listMapper->addIdentifier('codePostal');
        $listMapper->addIdentifier('Ville');
        $listMapper->addIdentifier('numberLicence');
        $listMapper->addIdentifier('dateOfBirth');
    }
    
    public function preValidate($user){
        $form = $this->getForm();

       if(count( $user->getCodePostal() ) != 5){

           $form->addError(new FormError('Post Code Must Be 5'));
       }
        if(count( $user->getPhone() ) != 10){
           $form->addError(new FormError('Phone Must Be 10'));
       }
       
    }
}
