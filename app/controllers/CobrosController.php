<?php

class CobrosController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoCajas();
        $cajas = $dao->getCajas();

        require_once './app/view/Cobros/gestion.php';
    }

    
    public function getDatosCliente() {
        $dao = new DaoCobros();
        
        $dao->objeto->setCarnet($_REQUEST["carnet"]);

        echo $dao->getDatosCliente();
    }

    public function mostrarProductos() {
        $idCaja = (isset($_REQUEST['idCaja']))? $_REQUEST['idCaja']:0;

        $dao = new DaoCobros();

        echo $dao->mostrarProductos($idCaja);
    }

    public function getDatosProductoCodigo() {
        $dao = new DaoCobros();
        
        $dao->objeto->setCodigo($_REQUEST["codigo"]);
        $dao->objeto->setCaja($_REQUEST["caja"]);

        echo $dao->getDatosProductoCodigo();
    }

    public function getDatosProductoNombre() {
        $dao = new DaoCobros();
        
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCaja($_REQUEST["caja"]);

        echo $dao->getDatosProductoNombre();
    }

    public function mostrarCombos() {
        $idCaja = $_REQUEST['idCaja'];

        $dao = new DaoCobros();

        echo $dao->mostrarCombos($idCaja);
    }


    public function guardarEncabezado(){
       

        $dao = new DaoCobros();

            $dao->objeto->setCarnet($_REQUEST["carnet"]);
            $dao->objeto->setEfectivo($_REQUEST["efectivo"]);
            $dao->objeto->setTotal($_REQUEST["total"]);
            $dao->objeto->setCambio($_REQUEST["cambio"]);
            $dao->objeto->setTipoPago($_REQUEST["tipoPago"]);
            if($_REQUEST["tipoPago"]=='Efectivo'){
                $dao->objeto->setDescuentoSubsidio("0.00");
                $dao->objeto->setDescuentoPlanilla("0.00");
            }
            else if($_REQUEST["tipoPago"]=='Parcial en planilla'){
                $dao->objeto->setDescuentoSubsidio("0.00");
                $dao->objeto->setDescuentoPlanilla($_REQUEST["descPlanilla"]);
            }
            else if($_REQUEST["tipoPago"]=='Descuento en planilla'){
                $dao->objeto->setDescuentoSubsidio("0.00");
                $dao->objeto->setDescuentoPlanilla($_REQUEST["descPlanilla"]);
            }
            $dao->objeto->setNomUsuario($_REQUEST["usuario"]);

            echo $dao->guardarEncabezado();
          
    }
    

    public function guardarDetalle(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoCobros();

        foreach($detalles as $detalle) {
            $dao->objeto->setCodigo($detalle->codigoProductoL);
            $dao->objeto->setNombreProducto($detalle->nombreProductoL);
            $dao->objeto->setPrecio($detalle->precioProductoDecimalL);
            $dao->objeto->setCantidad($detalle->cantidadProductoL);
    

            if($dao->guardarDetalle()) {
                $contador++;
            } else {
                echo 'nell';
            }

        }

        if($contador == count($detalles)) {
            echo 1;
        } else {
            echo 2;
        }
    }


    public function anularTicket(){
        $id = $_REQUEST['id'];
        $idCaja = $_REQUEST['caja'];

        $dao = new DaoCobros();

        echo $dao->getEncabezadoTicket($id, $idCaja);
    }

    public function detalleTicket(){
        $id = $_REQUEST['id'];
        $idCaja = $_REQUEST['caja'];

        $dao = new DaoCobros();

        echo $dao->getDetalleTicket($id, $idCaja);
    }


    public function anularEstadoTicket() {
        $id = $_REQUEST['id'];

        $dao = new DaoCobros();

        echo $dao->anularEstadoTicket($id);
    }

}