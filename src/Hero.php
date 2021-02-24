<?php 

namespace App;

class Hero {
    protected $nom;
    protected $posY;
    protected $posX;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get the value of posX
     */ 
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set the value of posX
     *
     * @return  self
     */ 
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get the value of posY
     */ 
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set the value of posY
     *
     * @return  self
     */ 
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }
}