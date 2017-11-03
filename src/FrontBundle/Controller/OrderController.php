<?php
/**
 * Created by PhpStorm.
 * User: Christian
 */


namespace FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * This controller is used to simulate an order from a customer.
 * Class OrderController
 */
class OrderController extends Controller
{
   
    public function prepareAction()
    {
        
        return $this->render('FrontBundle:Default:prepare.html.twig');
    }

    public function Session()
    {
        $frontSession = $this->get('front.session');
        $frontSession->initiate($this->get('session'));
        
        return $frontSession;
    }
    public function checkoutSuccessAction()
    {
        return $this->render('FrontBundle:Default:checkout.html.twig');
    }
    public function checkoutAction(Request $request)
    {
        $cart = $this->Session()->getCart();
        $totalPrice = 0;
        if(!empty($cart)){
            foreach ($cart as $c){
                $totalPrice+= $c->getPrice();
            }
        }
        \Stripe\Stripe::setApiKey("sk_test_Mtp40DUIRNqfrkWgxvmZWLyG");
        
        // Get the credit card details submitted by the form
        $token = $request->get('stripeToken');
        // Create a charge: this will charge the user's card
        try {

        $amount = $totalPrice*100;    
        // Create a Customer:
        $customer = \Stripe\Customer::create(array(
        "email" => "paying.user@example.com",
        "source" => $token,
        ));
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // Amount in cents
                "currency" => "eur",
                "customer" => $customer->id
            ));
            $this->addFlash("success","Bravo ça marche !");
            return $this->redirect($this->generateUrl('order_checkout_success'));
            //return $this->redirectToRoute("order_checkout");
        } catch(\Stripe\Error\Card $e) {
            
            $this->addFlash("error","Snif ça marche pas :(");
            return $this->redirectToRoute("prepare_page");
            // The card has been declined
        }
    }
}