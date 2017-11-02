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
        $user = $this->getUser();
        return $this->render('FrontBundle:Default:home.html.twig',['user'=>$user]);
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

            return $this->redirectToRoute('/home');
        }
        return $this->render('FrontBundle:Default:login.html.twig',['form'=>$form->createview()]);




    }
    
     public function registrationAction()
    {
        return $this->render('FrontBundle:Default:registration.html.twig');
    }

    
    public function bookingAction($vehiculeId)
    {
        $em = $this->getDoctrine()->getManager();
        $vehicleBrands = $em->getRepository('AppBundle:Vehicle')
                ->getMarques();
        $CurrentVehicle = $em->getRepository('AppBundle:Vehicle')
                    ->findById($vehiculeId);
        return $this->render('FrontBundle:Default:booking.html.twig',['vehicle'=>$CurrentVehicle[0]]);
    }

    public function listvehicleAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $vehicle = $em->getRepository('AppBundle:Vehicle')
                    ->findAll();
        return $this->render('FrontBundle:Default:listvehicle.html.twig',array('vehicles'=>$vehicle,'user'=>$user));
    }

    public function basketAction()
    {
        return $this->render('FrontBundle:Default:basket.html.twig');
    }
    public function paymentAction()
    {
        return $this->render('FrontBundle:Default:payment.html.twig');
    }
    

    public function profileAction()
    {
        return $this->render('FrontBundle:Default:profile.html.twig');
    }
    
        public function edit_contentAction()
    {
        $form = $this->createForm(PostType::class, $post);
        return $this->render('FOSUserBundle:Profile:edit_content.html.twig');
    }




 
    
}
