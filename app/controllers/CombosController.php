<?php

class CombosController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();

        require_once './app/view/Combos/gestion.php';
    }


    public function getDatosProductoCodigoCombos() {
        $dao = new DaoCombos();
        
        $dao->objeto->setCodigo($_REQUEST["codigo"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);

        echo $dao->getDatosProductoCodigoCombos();
    }

    public function getDatosProductoNombreCombos() {
        $dao = new DaoCombos();
        
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);

        echo $dao->getDatosProductoNombreCombos();
    }


    public function mostrarProductos() {
        $idCaja = (isset($_REQUEST['sucursal']))? $_REQUEST['sucursal']:0;

        $dao = new DaoCombos();

        echo $dao->mostrarProductos($idCaja);
    }


    public function guardarCombo(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoCombos();

        foreach($detalles as $detalle) {
            $dao->objeto->setNombre($detalle->nombreComboL);
            $dao->objeto->setCodigoSucursal($detalle->sucursalL);
            $dao->objeto->setCodigo($detalle->codigoProductoL);
            $dao->objeto->setCantidad($detalle->cantidadProductoL);
    

            if($dao->guardarCombo()) {
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


    public function mostrarCombos() {
        $idCaja = (isset($_REQUEST['sucursal']))? $_REQUEST['sucursal']:0;

        $dao = new DaoCombos();

        echo $dao->mostrarCombos($idCaja);
    }


    public function eliminar() {
        $dao = new DaoCombos();

        $dao->objeto->setCodigoSucursal($_REQUEST["idSucursalE"]);
        $dao->objeto->setNombre($_REQUEST["idEliminar"]);

        echo $dao->eliminar();
    }

    public function getDatosCombos() {
        $dao = new DaoCombos();
        
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);

        echo $dao->getDatosCombos();
    }

    public function getDatosCombosCobro() {
        $dao = new DaoCombos();
        
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);

        echo $dao->getDatosCombosCobro();
    }

    

    public function guardarComboE(){
       


        $dao = new DaoCombos();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);
        $dao->objeto->setCodigo($_REQUEST["codigo"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
    
        echo $dao->guardarCombo();
         
    }
    

    public function eliminarElementoCombo(){
       


        $dao = new DaoCombos();

        $dao->objeto->setNombre($_REQUEST["combo"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["idSucursal"]);
        $dao->objeto->setCodigo($_REQUEST["codigo"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
    
        echo $dao->eliminarElementoCombo();
         
    }



}

?>