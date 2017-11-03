<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of PanierController
 *
 * @author ronald
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    
    public function verficationAction()
    {
        $session = $this->container->get('front.emotion.session');
        dump($session);
        return new Response('Ok');
    }

    public function indexAction()
    {
        //return $this->render('FrontBundle:Panier:affiche');
        return $this->afficheAction();
    }
    
    public function afficheAction()
    {
        $cart = $this->Session()->getCart();
        $totalPrice = 0;
        foreach ($cart as $c){
            $totalPrice+= $c->getPrice();
        }
        return $this->render('FrontBundle:Default:basket.html.twig',['cart'=>$cart,'prix_total'=>$totalPrice]);
    }
    
    public function Session()
    {
        $frontSession = $this->get('front.session');
        $frontSession->initiate($this->get('session'));
        
        return $frontSession;
    }

    public function addAction(Product $product)
    {
        return $this->render('FrontBundle:Cart:vehicle.php', array('product' => $product));
    }
    
    public function removeAction($index)
    {
        $this->Session()->removeFromCart($index);
        return $this->redirect($this->generateUrl('basket_page'));
    }
    
}
