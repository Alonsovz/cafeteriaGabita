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


    public function detalleApertura(){
        $caja = $_REQUEST['idCaja'];

        $dao = new DaoCajas();

        echo $dao->detalleApertura($caja);
    }

    public function detalleAperturaCierre(){
        $caja = $_REQUEST['idCaja'];

        $dao = new DaoCajas();

        echo $dao->detalleAperturaCierre($caja);
    }


    public function aperturar(){
        $caja = $_REQUEST['idCaja'];
        $cambio = $_REQUEST['cambio'];
        $usuario = $_REQUEST["usuario"];

        $dao = new DaoCajas();

        echo $dao->aperturar($caja,$cambio,$usuario);
    }

    public function cerrar(){
        $caja = $_REQUEST['idCaja'];
        $montoCambio = $_REQUEST['montoCambio'];
        $usuario = $_REQUEST["usuario"];
        $recibidoEfectivo = $_REQUEST["recibidoEfectivo"];
        $cambioDado = $_REQUEST["cambioDado"];
        $remanente  = $_REQUEST["remanente"];
        $fechaA  = $_REQUEST["fechaA"];
        $usuarioA = $_REQUEST["usuarioA"];

        $dao = new DaoCajas();

        echo $dao->cerrar($caja,$montoCambio,$usuario, $recibidoEfectivo, $cambioDado,  $remanente, $usuarioA, $fechaA);
    }
}


?>
