<?php 

class DaoCajas extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Cajas();
    }

    public function mostrarcajas() {
        $_query = "select a.*, s.nombre as sucursal from cajas a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\"  sucursal=\"'.$fila["idSucursal"].'\"  class=\"ui btnEditar icon orange small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }




    public function registrar() {
        $_query = "insert into cajas values(null,'".$this->objeto->getNombre()."',
        ".$this->objeto->getCodigoSucursal().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update cajas set nombre ='".$this->objeto->getNombre()."',
        idSucursal = ".$this->objeto->getCodigoSucursal()."
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
    public function eliminar() {
        $_query = "update cajas set idEliminado = 2
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function getCajas() {
        $_query = "select a.*, s.nombre as sucursal from cajas a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado=1 and s.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{<option value= '.$fila['id'].'>'.$fila['nombre'].'--'.$fila['sucursal'].'</option>},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


}



?>