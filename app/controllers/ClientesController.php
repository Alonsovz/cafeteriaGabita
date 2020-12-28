<?php

class ClientesController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoAreas();
        $areas = $dao->getAreas();

        require_once './app/view/Clientes/gestion.php';
    }

    public function  mostrarClientes() {
        $dao = new DaoClientes();

        echo $dao->mostrarClientes();
    }


    public function registrar() {
        $dao = new DaoClientes();
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCarnet($_REQUEST["carnet"]);
        $dao->objeto->setCodigoArea($_REQUEST["area"]);
        echo $dao->registrar();
    }


    
    public function editar() {
        $dao = new DaoClientes();
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setCarnet($_REQUEST["carnetE"]);
        $dao->objeto->setCodigoArea($_REQUEST["areaE"]);
        $dao->objeto->setCodigo($_REQUEST["idEditar"]);
        echo $dao->editar();
    }

    public function eliminar() {
        $dao = new DaoClientes();
        $dao->objeto->setCodigo($_REQUEST["idEliminar"]);
        echo $dao->eliminar();
    }



}


?>