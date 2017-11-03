<?php

namespace FrontBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Reservation;
class FrontSession 
{
    private $session;
    
    public function initiate(Session $session)
    {
        $this->session = $session;
    }
    
    public function getSessionInfo()
    {
        return $this->session;
    }
    
    public function addToCart(Reservation $reservation)
    {
        $cart = $this->getCart();
        if(!is_null($cart)){
            foreach ($cart as $c){
                if($reservation->getIdVehicle() == $c->getIdVehicle()){
                    return false;
                }
            }
        }
        $cart[] = $reservation;
        $this->session->set('cart',$cart);
        return true;
    }
    
    public function getCart()
    {
        return $this->session->get('cart');
    }
    public function removeFromCart($index)
    {
        $cart = $this->getCart();
        array_splice($cart, (int)$index,1);
        $this->session->set('cart',$cart);
        return true;
    }
    public function removeCart()
    {
        return $this->session->remove('cart');
    }
}
