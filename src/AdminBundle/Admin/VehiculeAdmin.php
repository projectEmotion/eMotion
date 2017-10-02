<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class VehiculeAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof Vehicle
            ? $object->getTitle()
            : 'Vehicule'; // shown in the breadcrumb on the create view
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('brand',TextType::class);
        $formMapper->add('model',TextType::class);
        $formMapper->add('serial_number',TextType::class);
        $formMapper->add('color',TextType::class);
        $formMapper->add('licence_plate',TextType::class);
        $formMapper->add('kilometer',TextType::class);
        $formMapper->add('date_of_purchase','date',array('years' => range(1980,date('Y'))));
        $formMapper->add('price_of_purchase','text');
        $formMapper->add('availability','checkbox');
        $formMapper->add('vehicle_type',ChoiceType::class, array(
            'choices' => array(
                'Scooter' => true,
                'Voiture' => false,
            ),
        ));
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('brand');
        $listMapper->addIdentifier('model');
        $listMapper->addIdentifier('serial_number');
        $listMapper->addIdentifier('color');
        $listMapper->addIdentifier('licence_plate');
        $listMapper->addIdentifier('kilometer');
        $listMapper->addIdentifier('date_of_purchase','date');
        $listMapper->addIdentifier('price_of_purchase');
        $listMapper->addIdentifier('availability');
        $listMapper->addIdentifier('vehicle_type');
        $listMapper->addIdentifier('id');
    }
}
