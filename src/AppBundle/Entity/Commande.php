<?php

namespace AppBundle\Entity;

/**
 * Commande
 */
class Commande
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \stdClass
     */
    private $idUser;

    /**
     * @var \stdClass
     */
    private $idVehicule;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var \DateTime
     */
    private $dateAchat;


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
     * Set idUser
     *
     * @param \stdClass $idUser
     *
     * @return Commande
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \stdClass
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idVehicule
     *
     * @param \stdClass $idVehicule
     *
     * @return Commande
     */
    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;

        return $this;
    }

    /**
     * Get idVehicule
     *
     * @return \stdClass
     */
    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Commande
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set dateAchat
     *
     * @param \DateTime $dateAchat
     *
     * @return Commande
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }
}

