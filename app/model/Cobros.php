<?php 

class Cobros extends ModeloBase{
    private $codigo;
    private $carnet;
    private $caja;
    private $nombre;

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
     * Get the value of caja
     */ 
    public function getCaja()
    {
        return $this->caja;
    }

    /**
     * Set the value of caja
     *
     * @return  self
     */ 
    public function setCaja($caja)
    {
        $this->caja = $caja;

        return $caja;
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


     
}

 



?>