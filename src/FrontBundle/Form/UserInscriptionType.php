<?php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('adress','text');
        $builder->add('username','text');
        $builder->add('firstName','text');
        $builder->add('lastName','text');
        $builder->add('email','text');
        $builder->add('plainPassword','text');
        $builder->add('dateOfBirth','date');
        $builder->add('phone','text');
        $builder->add('codePostal','text');
        $builder->add('ville','text');
        $builder->add('numberLicence','text');

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
