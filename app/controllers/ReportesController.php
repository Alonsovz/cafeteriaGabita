<?php

class ReportesController extends ControladorBase {

    public static function gestion() {
        self::loadMain();
        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();
        
        require_once './app/view/Reportes/gestion.php';
    }


    public function detalleCliente(){
        $idSucursal = $_REQUEST['idSucursal'];
        $carnet = $_REQUEST['carnet'];
        $fecha1 = $_REQUEST['fecha1'];
        $fecha2 = $_REQUEST['fecha2'];

        $dao = new DaoReportes();

        echo $dao->detalleCliente($idSucursal,$fecha1,$fecha2,$carnet);
    }


    public function detalleClientes(){
        $idSucursal = $_REQUEST['idSucursal'];
        $fecha1 = $_REQUEST['fecha1'];
        $fecha2 = $_REQUEST['fecha2'];

        $dao = new DaoReportes();

        echo $dao->detalleClientes($idSucursal,$fecha1,$fecha2);
    }
}



?>