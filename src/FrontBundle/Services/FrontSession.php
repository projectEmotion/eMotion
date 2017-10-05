<?php

namespace FrontBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;
class FrontSession 
{
    private $session;
    
    public function __construct()
    {
        $this->session = new Session();
    }
    
    protected function setUser(User $user)
    {
        $this->session->set('user',$user);
    }
    
    protected function getUser()
    {
        return $this->session->get('user');
    }
}
