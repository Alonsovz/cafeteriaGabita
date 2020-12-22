<?php

class AreaController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();

        require_once './app/view/Areas/gestion.php';
    }


    public function registrar() {
        $dao = new DaoAreas();
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursal"]);
        $dao->objeto->setSubsidio($_REQUEST["subsidio"]);
        echo $dao->registrar();
    }


    public function mostrarAreas() {
        $dao = new DaoAreas();

        echo $dao->mostrarAreas();
    }


    public function editar() {
        $dao = new DaoAreas();
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["sucursalE"]);
        $dao->objeto->setSubsidio($_REQUEST["subsidioE"]);
        $dao->objeto->setCodigo($_REQUEST["idEditar"]);
        echo $dao->editar();
    }

    public function eliminar() {
        $dao = new DaoAreas();
        $dao->objeto->setCodigo($_REQUEST["idEliminar"]);
        echo $dao->eliminar();
    }
}


?>