<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class PaymentController extends Controller
{
    // public function verficationAction()
    // {
    //     $session = $this->container->get('front.emotion.session');
    //     dump($session);
    //     return new Response('Ok');
    // }

       public function indexAction()
       {
        $request = $this->container->get('request');
        $message = '';
        if($request->get('test'))
        {
            Stripe::setApiKey('pk_test_1uUx58I2mZLsuEbM5VwP1GU2');

            $token = $request->get('stripeToken');

            $customer = \Stripe_Customer::create(array(
                  'email' => 'customer@example.com',
                  'card'  => $token
            ));

            $charge = Stripe_Charge::create(array(
                  'customer' => $customer->id,
                  'amount'   => 5000,
                  'currency' => 'usd'
            ));

            $message = '<h1>Successfully charged $50.00!</h1>';
        }

       }
}
