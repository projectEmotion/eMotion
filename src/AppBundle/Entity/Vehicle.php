<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Events;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleRepository")
 */
class Vehicle
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
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=false)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number", type="string", length=255, nullable=true)
     */
    private $serialNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="licence_plate", type="string", length=255, nullable=true)
     */
    private $licencePlate;

    /**
     * @var integer
     *
     * @ORM\Column(name="kilometer", type="integer", nullable=true)
     */
    private $kilometer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_purchase", type="datetime", nullable=true)
     */
    private $dateOfPurchase;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_of_purchase", type="integer", nullable=true)
     */
    private $priceOfPurchase;

    /**
     * @var boolean
     *
     * @ORM\Column(name="availability", type="boolean", nullable=true)
     */
    private $availability;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vehicle_type", type="boolean", nullable=true)
     */
    private $vehicleType;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
     private $link;
     
     /**
      * 
      */
     private $file;
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
     * Set brand
     *
     * @param string $brand
     *
     * @return Vehicle
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }
    
    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Vehicle
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set serialNumber
     *
     * @param string $serialNumber
     *
     * @return Vehicle
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get serialNumber
     *
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Vehicle
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set licencePlate
     *
     * @param string $licencePlate
     *
     * @return Vehicle
     */
    public function setLicencePlate($licencePlate)
    {
        $this->licencePlate = $licencePlate;

        return $this;
    }

    /**
     * Get licencePlate
     *
     * @return string
     */
    public function getLicencePlate()
    {
        return $this->licencePlate;
    }

    /**
     * Set kilometer
     *
     * @param integer $kilometer
     *
     * @return Vehicle
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

    /**
     * Set dateOfPurchase
     *
     * @param \DateTime $dateOfPurchase
     *
     * @return Vehicle
     */
    public function setDateOfPurchase($dateOfPurchase)
    {
        $this->dateOfPurchase = $dateOfPurchase;

        return $this;
    }

    /**
     * Get dateOfPurchase
     *
     * @return \DateTime
     */
    public function getDateOfPurchase()
    {
        return $this->dateOfPurchase;
    }

    /**
     * Set priceOfPurchase
     *
     * @param integer $priceOfPurchase
     *
     * @return Vehicle
     */
    public function setPriceOfPurchase($priceOfPurchase)
    {
        $this->priceOfPurchase = $priceOfPurchase;

        return $this;
    }

    /**
     * Get priceOfPurchase
     *
     * @return integer
     */
    public function getPriceOfPurchase()
    {
        return $this->priceOfPurchase;
    }

    /**
     * Set availability
     *
     * @param boolean $availability
     *
     * @return Vehicle
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return boolean
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set vehicleType
     *
     * @param boolean $vehicleType
     *
     * @return Vehicle
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return boolean
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

      /**
     * Set link
     *
     * @param file $link
     *
     * @return Vehicle
     */
     public function setLink($link)
     {
         $this->link = $link;
 
         return $this;
     }
 
     /**
      * Get link
      *
      * @return file
      */
     public function getLink()
     {
         return $this->link;
     }
     
     /**
    * Sets file.
    *
    * @param UploadedFile $file
    */
    public function setFile(UploadedFile $file = null)
    {
       $this->file = $file;
    }
    
    /**
    * Get file.
    *
    * @return UploadedFile
    */
    public function getFile()
    {
        return $this->file;
    }
    
    public function lifecycleFileUpload()
    {
        
        if(is_null($this->getFile())){
            return;
        }
        
        $fileDir = 'uploads/';
        
        $fileName = $this->getId().'-'.$this->getFile()->getClientOriginalName();
        
        if(!empty($this->getLink())){
            unlink($this->getLink());
        }
        $this->getFile()->move(
            $fileDir,
            $fileName
        );
        
        $this->setLink($fileDir.$fileName);
        $this->setFile(null);
        
    }
    
    public function insertFile(LifecycleEventArgs $args)
    {
        $em = $args->getEntityManager();
        $this->lifecycleFileUpload();
        $em->persist($this);
        $em->flush();
    }
}
