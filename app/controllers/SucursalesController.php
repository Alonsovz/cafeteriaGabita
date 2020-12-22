<?php

class SucursalesController extends ControladorBase {

    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Sucursales/gestion.php';
    }


    public function registrar() {
        $dao = new DaoSucursal();
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        echo $dao->registrar();
    }


    public function mostrarSucursales() {
        $dao = new DaoSucursal();

        echo $dao->mostrarSucursales();
    }

    public function editar() {
        $dao = new DaoSucursal();
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setCodigo($_REQUEST["idEditar"]);
        echo $dao->editar();
    }

    public function eliminar() {
        $dao = new DaoSucursal();
        $dao->objeto->setCodigo($_REQUEST["idEliminar"]);
        echo $dao->eliminar();
    }
}


?>