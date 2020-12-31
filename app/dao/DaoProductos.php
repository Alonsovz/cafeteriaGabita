<?php 

class DaoProductos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Productos();
    }

    public function mostrarproductos($sucursal=0) {
        $_query = "select a.*, s.nombre as sucursal,CONCAT('$ ',ROUND(a.precio , 2 )) as precioTabla,
        ROUND(a.precio , 2 ) as precioDecimal  from productos a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado = 1 and a.idSucursal = ".$sucursal." ";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" codigo=\"'.$fila["codigo"].'\"  sucursal=\"'.$fila["idSucursal"].'\"  precio=\"'.$fila["precioDecimal"].'\" class=\"ui btnEditar icon blue small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrar() {
        $_query = "insert into productos values(null,'".$this->objeto->getCodigoBarra()."',
        '".$this->objeto->getNombre()."',
        ".$this->objeto->getCodigoSucursal().",".$this->objeto->getPrecio().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update productos set 
        codigo = '".$this->objeto->getCodigoBarra()."',
        nombre ='".$this->objeto->getNombre()."',
        precio = ".$this->objeto->getPrecio()."
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
    public function eliminar() {
        $_query = "update productos set idEliminado = 2
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }



    public function getProductoValidado()
    {

        $_query="select nombre from productos 
        WHERE codigo='".$this->objeto->getCodigoBarra()."' and idSucursal=".$this->objeto->getCodigoSucursal()."";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['nombre']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
        

    }


}



?>