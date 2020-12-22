<?php

class CajasController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();

        require_once './app/view/Cajas/gestion.php';
    }


    public function registrar() {
        $dao = new DaoCajas();
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);
        echo $dao->registrar();
    }


    public function mostrarCajas() {
        $dao = new DaoCajas();

        echo $dao->mostrarCajas();
    }


    public function editar() {
        $dao = new DaoCajas();
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursalE"]);
        $dao->objeto->setCodigo($_REQUEST["idEditar"]);
        echo $dao->editar();
    }

    public function eliminar() {
        $dao = new DaoCajas();
        $dao->objeto->setCodigo($_REQUEST["idEliminar"]);
        echo $dao->eliminar();
    }
}


?>