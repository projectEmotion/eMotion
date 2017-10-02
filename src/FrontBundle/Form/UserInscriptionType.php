<?php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Test\FormIntegrationTestCase;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\RegexValidator;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;




class UserInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentDate = date('Y');
        $builder->add('adress',TextType::class);
        $builder->add('username',TextType::class,array('required' => true,'constraints'=>array(new Length(array('min' => 3)))));
        $builder->add('firstName',TextType::class,array('required' => true,'constraints'=>array(new Length(array('min' => 2)))));
        $builder->add('lastName',TextType::class,array('required' => true,'constraints'=>array(new Length(array('min' => 2)))));
        $builder->add('email',EmailType::class,array('required' => true,'constraints'=>array(new Email())));
        $builder->add('plainPassword',TextType::class);
        $builder->add('dateOfBirth','date',array('years' => range($currentDate - 100 ,date('Y'))));
        $builder->add('phone',TextType::class);
        $builder->add('codePostal',TextType::class,array(

        ));
        $builder->add('ville',TextType::class);
        $builder->add('numberLicence',TextType::class,array(

        ));
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
