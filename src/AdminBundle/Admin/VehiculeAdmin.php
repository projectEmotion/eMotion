<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
        $formMapper->add('date_of_purchase','date',array('years' => range(1980,date('Y'))));
        $formMapper->add('price_of_purchase','text');
        $formMapper->add('availability','checkbox');
        $formMapper->add('price_for_hour','text');
        $formMapper->add('vehicle_type',ChoiceType::class, array(
            'choices' => array(
                'Scooter' => true,
                'Voiture' => false,
            ),
        ));
        
        $img = '<img src="/'.$this->getSubject()->getLink().'" height=100>';
        $formMapper->add('file',FileType::class,['required' => FALSE,'help'=>$img,'label' => 'Image']);
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
        //$listMapper->addIdentifier('link');
        $listMapper->addIdentifier('id');
    }
}
