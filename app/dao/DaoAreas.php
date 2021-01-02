<?php 

class DaoAreas extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Areas();
    }

    public function mostrarareas() {
        $_query = "select a.*, s.nombre as sucursal,CONCAT('$ ',ROUND(a.cantidadSubsidio , 2 )) as subsidio,
        ROUND(a.cantidadSubsidio , 2 ) as subsidioDecimal  from areas a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\"  sucursal=\"'.$fila["idSucursal"].'\"  subsidio=\"'.$fila["subsidioDecimal"].'\" class=\"ui btnEditar icon brown small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function getAreas() {
        $_query = "select a.*, s.nombre as sucursal from areas a 
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


    public function getSucursales() {
        $_query = "select * from sucursales where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{<option value= '.$fila['id'].'>'.$fila['nombre'].'</option>},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function registrar() {
        $_query = "insert into areas values(null,'".$this->objeto->getNombre()."',
        ".$this->objeto->getCodigoSucursal().",".$this->objeto->getSubsidio().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update areas set nombre ='".$this->objeto->getNombre()."',
        idSucursal = ".$this->objeto->getCodigoSucursal().",
        cantidadSubsidio = ".$this->objeto->getSubsidio()."
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
    public function eliminar() {
        $_query = "update areas set idEliminado = 2
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function detalleArea($idSucursal = 0) {
        $_query = "select a.*, s.nombre as sucursal,CONCAT('$ ',ROUND(a.cantidadSubsidio , 2 )) as subsidio,
        ROUND(a.cantidadSubsidio , 2 ) as subsidioDecimal  from areas a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado = 1 and s.id= ".$idSucursal."";

        $resultado = $this->con->ejecutar($_query);


        $json = '';

        $json.='<br>
            <table style="margin:auto;width: 80%;">
            <thead>
                <tr>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Áreas</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Subsidio asignado</th>
                </tr>
            </thead>
            <tbody>
        ';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<tr> 
                        <td style="height: 30px;">'.$fila["nombre"].'</td>
                        <td style="height: 30px;">'.$fila["subsidio"].'</td>
                      </tr>';
        }

        $json.='</tbody>
            </table>
            <br>
            <h5 style="text-align:center;color:#337602;">Si desea hacer algún cambio en la cantidad de subsidio asignada,
                     ve a "Gestión de Áreas".</h5>
            <h5 style="text-align:center;color:black">
            <b style="color:red">IMPORTANTE: </b>
            Si un cliente no está asignado a un área, no se le asignará subsidio.</h5>
            ';

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }


}



?>