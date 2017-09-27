<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
        $formMapper->add('brand','text');
        $formMapper->add('model','text');
        $formMapper->add('serial_number','text');
        $formMapper->add('color','text');
        $formMapper->add('licence_plate','text');
        $formMapper->add('kilometer','text');
        $formMapper->add('date_of_purchase','datetime');
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
        $listMapper->addIdentifier('date_of_purchase');
        $listMapper->addIdentifier('price_of_purchase');
        $listMapper->addIdentifier('availability');
        $listMapper->addIdentifier('vehicle_type');
        $listMapper->addIdentifier('id');
    }
}
