<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FrontBundle\Form\LoginType;
use FrontBundle\Form\ReservationType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Commande;



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

    
    public function bookingAction($vehiculeId,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $CurrentVehicle = $em->getRepository('AppBundle:Vehicle')
                    ->findById($vehiculeId);
        $reservation = new \AppBundle\Entity\Reservation();
        $reservation->setIdVehicle($CurrentVehicle[0]);
        $form = $this->createForm(ReservationType::class,$reservation);
        
        $formError = '';
        
        if($request->getMethod() == 'POST'){
            $form->handleRequest($request);
            
            $today = new \DateTime();
            $dateVerif = false;
            
            if($reservation->getStartDate() >= $today){
                if($reservation->getEndDate()>$reservation->getStartDate()){
                    $dateVerif = true;
                }else{
                    $formError = 'Date de restitution doit etre superire à Date de prise ';
                    $dateVerif = false;
                }
            }else{
                $formError = 'Date de prise doit etre superire à auj ';
                $dateVerif = false;
            }
            
            if($dateVerif)
            {
                if(!$this->Session()->addToCart($reservation)){
                    $formError = 'Vous avez déja reserver cette vehicule';
                }else
                {
                    $this->forward('FrontBundle:Panier:index', array(
                        'name'  => $name,
                        'color' => 'green',
                    ));
                }
                
            }
        }
        
        
        return $this->render('FrontBundle:Default:booking.html.twig',['vehicle'=>$CurrentVehicle[0],'form'=>$form->createView(),'error'=>$formError]);
    }
    
    public function Session()
    {
        $frontSession = $this->get('front.session');
        $frontSession->initiate($this->get('session'));
        
        return $frontSession;
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

    public function factureAction()
    {
        $commande = new commande();
        
        $snappy = $this->get('knp_snappy.pdf');
        
        $html = $this->renderView('FrontBundle:Default:facture.html.twig', array(
            'user' => $user,
        ));
        
        $filename = 'Facture';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"',
                '--user-style-sheet'      =>  'assets/css/pdf.css' 
            )
        );
    }

    
}
