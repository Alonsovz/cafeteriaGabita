<?php 

class Clientes extends ModeloBase{
    private $nombre;
    private $codigo;
    private $carnet;
    private $codigoArea;

    public function __construct() {

    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of carnet
     */ 
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Set the value of subsidio
     *
     * @return  self
     */ 
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

        return $this;
    }


     /**
     * Get the value of CodigoArea
     */ 
    public function getCodigoArea()
    {
        return $this->codigoArea;
    }

    /**
     * Set the value of codigoArea
     *
     * @return  self
     */ 
    public function setCodigoArea($codigoArea)
    {
        $this->codigoArea = $codigoArea;

        return $this;
    }
}

 



?>