<?php 

class DaoClientes extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Clientes();
    }

    public function mostrarClientes() {
        $_query = "select c.*, a.nombre as area, s.nombre as sucursal  from clientes c
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        where c.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\"  area=\"'.$fila["idArea"].'\"  carnet=\"'.$fila["carnet"].'\" class=\"ui btnEditar icon brown small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrar() {
        $_query = "insert into clientes values(null,'".$this->objeto->getNombre()."',
        '".$this->objeto->getCarnet()."',".$this->objeto->getCodigoArea().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update clientes set nombre ='".$this->objeto->getNombre()."',
        carnet = '".$this->objeto->getCarnet()."',
        idArea = ".$this->objeto->getCodigoArea()."
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update clientes set idEliminado = 2
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }



}