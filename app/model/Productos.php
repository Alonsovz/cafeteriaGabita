<?php 

class Productos extends ModeloBase{
    private $nombre;
    private $codigo;
    private $codigoBarra;
    private $precio;
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
     * Get the value of codigoBarra
     */ 
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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