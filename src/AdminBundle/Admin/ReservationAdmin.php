<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReservationAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof Reservation
            ? $object->getTitle()
            : 'Reservation'; // shown in the breadcrumb on the create view
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('price','text');
        $formMapper->add('id_user','entity',array(
            'class' => 'AppBundle:User',
            'choice_label' => function ($user) {
                return $user->getId().' - '.$user->getUsername();
            }
        ));
        $formMapper->add('idVehicle','entity',array(
            'class' => 'AppBundle:Vehicle',
            'choice_label' => function ($vehicle) {
                return $vehicle->getId().' - '.$vehicle->getBrand().' - '.$vehicle->getModel();
            }
        ));
        $formMapper->add('start_date','date',array('years' => range(2017,date('Y'))));
        $formMapper->add('end_date','date',array('years' => range(2018,date('Y'))));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->addIdentifier('price');
        $listMapper->addIdentifier('start_date','date');
        $listMapper->addIdentifier('end_date','date');
    }
}
