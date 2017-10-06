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
        $attr = [
                'class'=>'form-control margin-bottom-20'
            ];
        $builder->add('adress','text',[
            'attr'=>$attr
        ]);
        $builder->add('username','text',array('attr'=>$attr,'required' => true,'constraints'=>array(new Length(array('min' => 3)))));
        $builder->add('firstName','text',array('attr'=>$attr,'required' => true,'constraints'=>array(new Length(array('min' => 2)))));
        $builder->add('lastName','text',['attr'=>$attr]);
        $builder->add('email','text',array('attr'=>$attr,'required' => true,'constraints'=>array(new Email())));
        $builder->add('plainPassword','text',['attr'=>$attr]);
        $builder->add('dateOfBirth','date',['attr'=>['id'=>"example-date-input",'class'=>'form-control']]);
        $builder->add('phone','text',['attr'=>$attr]);
        $builder->add('codePostal','text',['attr'=>$attr]);
        $builder->add('ville','text',['attr'=>$attr]);
        $builder->add('numberLicence','text',['attr'=>$attr]);
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
