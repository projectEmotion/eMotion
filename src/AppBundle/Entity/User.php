<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends BaseUser{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;
    
     /**
     * @ORM\Column(name="adress", type="string")
     */
    private $adress;

     /**
     * @ORM\Column(name="phone", type="integer")
     */
     private $phone;

    /**
     * @ORM\Column(name="number_licence", type="integer")
     */
    private $numberLicence;

    public function __construct()
    {
        parent::__construct();
        // your own logic


    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->date_of_birth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set numberLicence
     *
     * @param integer $numberLicence
     *
     * @return User
     */
    public function setNumberLicence($numberLicence)
    {
        $this->number_licence = $numberLicence;

        return $this;
    }

    /**
     * Get numberLicence
     *
     * @return integer
     */
    public function getNumberLicence()
    {
        return $this->number_licence;
    }
}
