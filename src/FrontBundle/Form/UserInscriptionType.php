<?php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
class UserInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentDate = date('Y');
        $builder->add('adress','text');
        $builder->add('username','text',array('required' => true,'constraints'=>array(new Length(array('min' => 3)))));
        $builder->add('firstName','text',array('required' => true,'constraints'=>array(new Length(array('min' => 2)))));
        $builder->add('lastName','text',array('required' => true,'constraints'=>array(new Length(array('min' => 2)))));
        $builder->add('email','text',array('required' => true,'constraints'=>array(new Email())));
        $builder->add('plainPassword','text');
        $builder->add('dateOfBirth','date',array('years' => range($currentDate - 100 ,date('Y'))));
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
