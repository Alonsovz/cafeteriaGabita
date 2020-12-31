<?php 

class Cobros extends ModeloBase{
    private $codigo;
    private $carnet;
    private $caja;
    private $nombre;

    private $total;
    private $efectivo;
    private $cambio;
    private $cantidad;
    private $nombreProducto;
    private $precio;
    private $tipoPago;
    private $nomUsuario;
    private $descuentoPlanilla;
    private $descuentoSubsidio;

    public function __construct() {

    }

    /**
     * Get the value of nomUsuario
     */ 
    public function getDescuentoSubsidio()
    {
        return $this->descuentoSubsidio;
    }

    /**
     * Set the value of nomUsuario
     *
     * @return  self
     */ 
    public function setDescuentoSubsidio($descuentoSubsidio)
    {
        $this->descuentoSubsidio = $descuentoSubsidio;

        return $this;
    }

    /**
     * Get the value of nomUsuario
     */ 
    public function getDescuentoPlanilla()
    {
        return $this->descuentoPlanilla;
    }

    /**
     * Set the value of nomUsuario
     *
     * @return  self
     */ 
    public function setDescuentoPlanilla($descuentoPlanilla)
    {
        $this->descuentoPlanilla = $descuentoPlanilla;

        return $this;
    }

    /**
     * Get the value of nomUsuario
     */ 
    public function getNomUsuario()
    {
        return $this->nomUsuario;
    }

    /**
     * Set the value of nomUsuario
     *
     * @return  self
     */ 
    public function setNomUsuario($nomUsuario)
    {
        $this->nomUsuario = $nomUsuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getTipoPago()
    {
        return $this->tipoPago;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setTipoPago($tipoPago)
    {
        $this->tipoPago = $tipoPago;

        return $this;
    }

     /**
     * Get the value of nombre
     */ 
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

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
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;

        return $cambio;
    }
     /**
     * Get the value of nombre
     */ 
    public function getEfectivo()
    {
        return $this->efectivo;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setEfectivo($efectivo)
    {
        $this->efectivo = $efectivo;

        return $efectivo;
    }

     /**
     * Get the value of nombre
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

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