<?php

class ProductosController extends ControladorBase {

    public static function gestion() {
        self::loadMain();

        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();

        require_once './app/view/Productos/gestion.php';
    }


    public function  mostrarProductos() {
        $dao = new DaoProductos();

        echo $dao->mostrarProductos();
    }


    public function registrar() {
        $dao = new DaoProductos();
        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        $dao->objeto->setCodigoBarra($_REQUEST["codigo"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["idSucursal"]);
        echo $dao->registrar();
    }


    public function editar() {
        $dao = new DaoProductos(); 
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setPrecio($_REQUEST["precioE"]);
        $dao->objeto->setCodigoBarra($_REQUEST["codigoE"]);
        $dao->objeto->setCodigo($_REQUEST["idEditar"]);
        echo $dao->editar();
    }

    public function eliminar() {
        $dao = new DaoProductos();
        $dao->objeto->setCodigo($_REQUEST["idEliminar"]);
        echo $dao->eliminar();
    }


    public function getProductoValidado()
    {
        $dao=new DaoProductos();
        $dao->objeto->setCodigoBarra($_REQUEST["codigo"]);
        $dao->objeto->setCodigoSucursal($_REQUEST["idSucursal"]);

        echo $dao->getProductoValidado();
    }


}