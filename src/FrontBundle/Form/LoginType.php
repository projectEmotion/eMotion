<?php


namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('userName','text',
                array(
                    'required' => true,
                    'constraints'=>array(
                        new Length(
                                array('min' => 3)
                                )
                        ),
                    'attr'=>[
                        'class'=>'form-control',
                        'placeholder' => 'Username'
                    ])
                );
        $builder->add('password','password');

    }

    

    public function getBlockPrefix()
    {
        return 'emotion_user_login';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}