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
}
