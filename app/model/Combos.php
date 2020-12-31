<?php 

class Combos extends ModeloBase{
    private $codigo;
    private $caja;
    private $nombre;
    private $codigoSucursal;
    private $cantidad;

    public function __construct() {

    }

/**
     * Get the value of nombre
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
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