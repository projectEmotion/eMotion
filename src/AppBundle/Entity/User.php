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

    /**
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(name="ville", type="string")
     */
    private $ville;

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
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
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
        $this->numberLicence = $numberLicence;

        return $this;
    }

    /**
     * Get numberLicence
     *
     * @return integer
     */
    public function getNumberLicence()
    {
        return $this->numberLicence;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return User
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
}
}
