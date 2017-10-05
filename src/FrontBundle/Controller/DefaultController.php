<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FrontBundle\Form\LoginType;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    

    public function indexAction()
    {
        return $this->render('FrontBundle:Default:home.html.twig');
    }
    
    public function loginAction(Request $req)
    {
        $User = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(LoginType::class,$User);
        
        if($req->isMethod('POST')){
            $form->handleRequest($req);
            $user = $this->getDoctrine()
                    ->getRepository('AppBundle:User')
                    ->findUser($User,$em);
        }
        return $this->render('FrontBundle:Default:login.html.twig',['form'=>$form->createview()]);
    }
    
     public function registrationAction()
    {
        return $this->render('FrontBundle:Default:registration.html.twig');
    }
<<<<<<< HEAD
    
    public function bookingAction()
    {
        return $this->render('FrontBundle:Default:booking.html.twig');
=======

    public function listvehicleAction()
    {
        return $this->render('FrontBundle:Default:listvehicle.html.twig');
>>>>>>> 9515fa0da185b33f71549c843c8f5684067f4216
    }
}
