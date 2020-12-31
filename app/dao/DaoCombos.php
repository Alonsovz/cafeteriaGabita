<?php 

class DaoCombos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Combos();
    }

    public function mostrarCombos($sucursal=0){

        
        $_query = " select CONCAT('$ ',round(sum(p.precio * c.cantidad),2)) as total, c.nombre as nombre,
        s.id as idSucursal,
        s.nombre as sucursal from combos c
                inner join productos p on p.id = c.idProducto
                inner join sucursales s on s.id = c.idSucursal
                where c.idSucursal = ".$sucursal." and c.idEliminado = 1
                GROUP by c.nombre";

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            while($fila = $resultado->fetch_assoc()) {

                $object = json_encode($fila);

                $btnEditar = '<button  nombre=\"'.$fila["nombre"].'\" total=\"'.$fila["total"].'\"  sucursal=\"'.$fila["sucursal"].'\" idSucursal=\"'.$fila["idSucursal"].'\"  class=\"ui green icon small button btnEditar\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button nombre=\"'.$fila["nombre"].'\" idSucursal=\"'.$fila["idSucursal"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

                $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

                $object = substr_replace($object, $acciones, strlen($object) -1, 0);

                $_json .= $object.',';
            }

            $_json = substr($_json,0, strlen($_json) - 1);

            return '{"data": ['.$_json .']}';
       
    }

    public function mostrarProductos($sucursal=0){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        where p.idEliminado = 1 and p.idSucursal = ".$sucursal."";

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            while($fila = $resultado->fetch_assoc()) {

                $object = json_encode($fila);

                $btnEditar = '<a style=\"font-size:20px;\" id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" codigo=\"'.$fila["codigo"].'\"  precioDecimal=\"'.$fila["precioDecimal"].'\" precioTabla=\"'.$fila["precioTabla"].'\" class=\"btnEditarP\"><i class=\"arrow circle up icon\"></i></a>';
      
                $acciones = ', "Acciones": "'.$btnEditar.'"';

                $object = substr_replace($object, $acciones, strlen($object) -1, 0);

                $_json .= $object.',';
            }

            $_json = substr($_json,0, strlen($_json) - 1);

            return '{"data": ['.$_json .']}';
       
    }


    public function getDatosProductoCodigoCombos(){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        where p.idEliminado = 1 and p.idSucursal = ".$this->objeto->getCodigoSucursal()." 
        and p.codigo = '".$this->objeto->getCodigo()."'";

           
        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json; 
    }

    public function getDatosProductoNombreCombos(){

        
        $_query = " SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
        ROUND(p.precio , 2 ) as precioDecimal FROM productos p
        where p.idEliminado = 1 and p.idSucursal = ".$this->objeto->getCodigoSucursal()."
         and p.nombre = '".$this->objeto->getNombre()."'";

           
        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json; 
    }


    public function guardarCombo() {
        $corr= "SELECT max(id) as id from productos as p where p.idEliminado = 1
         and p.idSucursal = ".$this->objeto->getCodigoSucursal()." 
        and p.codigo = '".$this->objeto->getCodigo()."' ";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idProducto = $fila['id'];

        $_query = "insert into combos values(null,'".$this->objeto->getNombre()."',
         ".$idProducto.",".$this->objeto->getCodigoSucursal().",".$this->objeto->getCantidad().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update combos set idEliminado = 2
        where nombre='".$this->objeto->getNombre()."' and idSucursal = ".$this->objeto->getCodigoSucursal()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarElementoCombo() {
        $corr= "SELECT max(id) as id from productos as p where p.idEliminado = 1
         and p.idSucursal = ".$this->objeto->getCodigoSucursal()." 
        and p.codigo = '".$this->objeto->getCodigo()."' ";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idProducto = $fila['id'];

        $_query = "update combos set idEliminado = 2 where
         nombre='".$this->objeto->getNombre()."' and
         idProducto= ".$idProducto." and
         idSucursal =".$this->objeto->getCodigoSucursal()." and
         cantidad= ".$this->objeto->getCantidad()." ";

         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function getDatosCombos(){
        
        $_query = "SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
         ROUND(p.precio , 2 ) as precioDecimal, c.nombre as combo, c.cantidad as cantidad,
          s.id as idSucursal FROM productos p inner join combos c on c.idProducto = p.id 
        inner join sucursales s on s.id = c.idSucursal
        where c.idEliminado = 1 and c.nombre='".$this->objeto->getNombre()."' and c.idSucursal = ".$this->objeto->getCodigoSucursal()."";

        $_json = '';
        $resultado = $this->con->ejecutar($_query);
        while($fila = $resultado->fetch_assoc()) {
            $object = json_encode($fila);
            
            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '['.$_json .']';
    }

    public function getDatosCombosCobro(){
        
        $_query = "SELECT p.*,CONCAT('$ ',ROUND(p.precio , 2 )) as precioTabla,
         ROUND(p.precio , 2 ) as precioDecimal, c.nombre as combo, c.cantidad as cantidad,
          s.id as idSucursal FROM productos p inner join combos c on c.idProducto = p.id 
        inner join sucursales s on s.id = c.idSucursal
        inner join cajas cj on cj.idSucursal = s.id
        where  c.idEliminado = 1 and c.nombre='".$this->objeto->getNombre()."' and cj.id = ".$this->objeto->getCodigoSucursal()."";

        $_json = '';
        $resultado = $this->con->ejecutar($_query);
        while($fila = $resultado->fetch_assoc()) {
            $object = json_encode($fila);
            
            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '['.$_json .']';
    }


    

}


?>