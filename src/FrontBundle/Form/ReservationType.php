<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FrontBundle\Form;

/**
 * Description of ReservationType
 *
 * @author ronald
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = [
            'date_widget' => 'single_text',
            'attr'=>[
                'class' => 'form-control'
            ],
            'label' => 'Date de prise en charge',
            'time_widget' => 'choice'
        ];
        $builder->add('startDate', DateTimeType::class,$data);
        
        $data = [
                'date_widget' => 'single_text',
                'attr'=>[
                    'class' => 'form-control'
                ],
                'label' => 'Date de restitution',
                'time_widget' => 'choice'
            ];
        
        $builder->add('endDate',DateTimeType::class,$data);
        $data = [
                'data' => 2 
            ];
    }
    
    
    
}
