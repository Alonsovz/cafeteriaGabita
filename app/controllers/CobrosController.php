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
    


}