<?php

namespace AppBundle\Entity;

/**
 * Vehicle
 */
class Vehicle
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $serialNumber;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $licencePlate;

    /**
     * @var int
     */
    private $kilometer;

    /**
     * @var \DateTime
     */
    private $dateOfPurchase;

    /**
     * @var int
     */
    private $priceOfPurchase;

    /**
     * @var bool
     */
    private $availability;

    /**
     * @var bool
     */
    private $vehicleType;


    /**
     * Get id
     *
     * @return int
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
     * @return int
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
     * @return int
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
     * @return bool
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
     * @return bool
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }
}

