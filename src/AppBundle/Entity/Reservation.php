<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="IDX_42C84955C51D4DF6", columns={"id_vehicle"}), @ORM\Index(name="IDX_42C849556B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;
     
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="kilometer", type="integer", nullable=true)
     */
    private $kilometer;
    

    /**
     * @var \AppBundle\Entity\Vehicle
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vehicle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vehicle", referencedColumnName="id")
     * })
     */
    private $idVehicle;

    


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Reservation
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Reservation
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Reservation
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
     /**
     * Set status
     *
     * @param string $status
     *
     * @return Reservation
     */
     public function setStatus($status)
     {
         $this->status = $status;
 
         return $this;
     }
 
     /**
      * Get status
      *
      * @return string
      */
     public function getStatus()
     {
         return $this->status;
     }
   
    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Reservation
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idVehicle
     *
     * @param \AppBundle\Entity\Vehicle $idVehicle
     *
     * @return Reservation
     */
    public function setIdVehicle(\AppBundle\Entity\Vehicle $idVehicle = null)
    {
        $this->idVehicle = $idVehicle;

        return $this;
    }

    /**
     * Get idVehicle
     *
     * @return \AppBundle\Entity\Vehicle
     */
    public function getIdVehicle()
    {
        return $this->idVehicle;
    }
    
    /**
     * Set kilometer
     *
     * @param integer $kilometer
     *
     * @return Reservation
     */
    public function setKilometer($kilometer)
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    /**
     * Get kilometer
     *
     * @return integer
     */
    public function getKilometer()
    {
        return $this->kilometer;
    }
}
