<?php 

class Areas extends ModeloBase{
    private $nombre;
    private $codigo;
    private $subsidio;
    private $codigoSucursal;

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
     * Get the value of subsidio
     */ 
    public function getSubsidio()
    {
        return $this->subsidio;
    }

    /**
     * Set the value of subsidio
     *
     * @return  self
     */ 
    public function setSubsidio($subsidio)
    {
        $this->subsidio = $subsidio;

        return $this;
    }


     /**
     * Get the value of codigoSucursal
     */ 
    public function getCodigoSucursal()
    {
        return $this->codigoSucursal;
    }

    /**
     * Set the value of codigoSucursal
     *
     * @return  self
     */ 
    public function setCodigoSucursal($codigoSucursal)
    {
        $this->codigoSucursal = $codigoSucursal;

        return $this;
    }
}

 



?>