<?php 

class DaoCobros extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Cobros();
    }


    public function getDatosCliente()
    {

        $_query = "select c.*, a.nombre as area, s.nombre as sucursal  from clientes c
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        where c.idEliminado = 1 and c.carnet= '".$this->objeto->getCarnet()."'";

        
        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json; 
        

    }


    public function mostrarProductos($idCaja=0){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        INNER join sucursales s on s.id = p.idSucursal
        INNER join cajas c on c.idSucursal = s.id
        where p.idEliminado = 1 and c.id = ".$idCaja."";

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            while($fila = $resultado->fetch_assoc()) {

                $object = json_encode($fila);

                $btnEditar = '<a style=\"font-size:20px;\" id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" codigo=\"'.$fila["codigo"].'\"  precioDecimal=\"'.$fila["precioDecimal"].'\" precioTabla=\"'.$fila["precioTabla"].'\" class=\"btnEditar\"><i class=\"arrow circle up icon\"></i></a>';
      
                $acciones = ', "Acciones": "'.$btnEditar.'"';

                $object = substr_replace($object, $acciones, strlen($object) -1, 0);

                $_json .= $object.',';
            }

            $_json = substr($_json,0, strlen($_json) - 1);

            return '{"data": ['.$_json .']}';
       
    }


    public function getDatosProductoCodigo(){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        INNER join sucursales s on s.id = p.idSucursal
        INNER join cajas c on c.idSucursal = s.id
        where p.idEliminado = 1 and c.id = ".$this->objeto->getCaja()." and p.codigo = '".$this->objeto->getCodigo()."'
        ";

           
        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json; 
    }

    public function getDatosProductoNombre(){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        INNER join sucursales s on s.id = p.idSucursal
        INNER join cajas c on c.idSucursal = s.id
        where p.idEliminado = 1 and c.id = ".$this->objeto->getCaja()." and p.nombre = '".$this->objeto->getNombre()."'
        ";

           
        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json; 
    }
}


?>