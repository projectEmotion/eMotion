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

        return $this->redirectToRoute('homepage');


    }
    
     public function registrationAction()
    {
        return $this->render('FrontBundle:Default:registration.html.twig');
    }

    
    public function bookingAction()
    {
        return $this->render('FrontBundle:Default:booking.html.twig');
    }

    public function listvehicleAction()
    {
        return $this->render('FrontBundle:Default:listvehicle.html.twig');
    }

    public function basketAction()
    {
        return $this->render('FrontBundle:Default:basket.html.twig');
    }
    public function paymentAction()
    {
        return $this->render('FrontBundle:Default:payment.html.twig');
    }
    

    public function myprofileAction()
    {
        return $this->render('FrontBundle:Default:myprofile.html.twig');
    }
}
