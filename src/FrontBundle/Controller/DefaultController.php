<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:home.html.twig');
    }
    
    public function loginAction()
    {
        return $this->render('FrontBundle:Default:login.html.twig');
    }
    
     public function registrationAction()
    {
        return $this->render('FrontBundle:Default:registration.html.twig');
    }
}
