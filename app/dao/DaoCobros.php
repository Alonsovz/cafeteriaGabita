<?php 

class DaoCobros extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Cobros();
    }


    public function getDatosCliente()
    {

        $_query = "select c.*, a.nombre as area, s.nombre as sucursal,
        case 
        when (

            select CONCAT('$ ',ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 ))   from clientes c
            inner join areas a on a.id = c.idArea
            inner join subsidio sb on sb.idCliente = c.id
            inner join enc_ticket t on t.idCliente = c.id
            where c.idEliminado = 1 and c.carnet= '".$this->objeto->getCarnet()."'
            and sb.mes = month(curdate()) and sb.anio = year(curdate())
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        ) != ''
        then 
        (

            select CONCAT('$ ',ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 ))   from clientes c
            inner join areas a on a.id = c.idArea
            inner join subsidio sb on sb.idCliente = c.id
            inner join enc_ticket t on t.idCliente = c.id
            where c.idEliminado = 1 and c.carnet= '".$this->objeto->getCarnet()."'
            and sb.mes = month(curdate()) and sb.anio = year(curdate())
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        )
        else 
        '$ 0.00'
        end as remanente,
        CONCAT('$ ',ROUND(a.cantidadSubsidio , 2 )) as subsidioArea  from clientes c
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


    public function mostrarCombos($sucursal = 0) {
        $_query = " select CONCAT('$ ',round(sum(p.precio * c.cantidad),2)) as total, c.nombre as nombre,
        s.id as idSucursal,
        s.nombre as sucursal from combos c
                inner join productos p on p.id = c.idProducto
                inner join sucursales s on s.id = c.idSucursal
                inner join cajas cj on cj.idSucursal = s.id
                where cj.id = ".$sucursal." and c.idEliminado = 1
                GROUP by c.nombre";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<button type="button" class="ui teal button btnCombo" total="'.$fila["total"].'" nombre="'.$fila["nombre"].'" idSucursal='.$fila["idSucursal"].'>'.$fila["nombre"].'</button>';
        }

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }

    public function guardarEncabezado() {
        $corr= "SELECT max(id) as id from clientes as p where p.idEliminado = 1
        and p.carnet = '".$this->objeto->getCarnet()."' ";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idCliente = $fila['id'];

        $_query = "insert into enc_ticket values(null,".$idCliente.",'".$this->objeto->getTipoPago()."',
         ".$this->objeto->getTotal().",".$this->objeto->getEfectivo().",".$this->objeto->getCambio().",
         ".$this->objeto->getDescuentoPlanilla().",".$this->objeto->getDescuentoSubsidio().",1,
         '".$this->objeto->getNomUsuario()."',now())";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function guardarDetalle() {
        $corr= "SELECT max(id) as id from enc_ticket";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idEncabezado = $fila['id'];


        $pro= "SELECT max(id) as id from productos as p where p.idEliminado = 1 
        and p.codigo = '".$this->objeto->getCodigo()."' ";

        $resultado2 = $this->con->ejecutar($pro);

        $fila1 = $resultado2->fetch_assoc();
        $idProducto = $fila1['id'];


        $_query = "insert into det_ticket values(null,".$idEncabezado.",".$idProducto.",
         '".$this->objeto->getNombreProducto()."',".$this->objeto->getPrecio().",
         ".$this->objeto->getCantidad().")";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getEncabezadoTicket($id = 0, $idCaja = 0) {
        $_query = "SELECT dt.*, c.nombre as cliente, c.carnet as carnet,
        CONCAT('$ ',round(efectivoRecibido,2)) as efectivoRecibidoTck,
        CONCAT('$ ',round(cambio,2)) as cambioTkc,
        CONCAT('$ ',round(total,2)) as totalTkc,
        CONCAT('$ ',round(descuentoPlanilla,2)) as descPlanilla,
        CONCAT('$ ',round(descuentoSubsidio,2)) as descSubsidio ,
        DATE_FORMAT(fechaEmision,'%d/%m/%Y') as fechaE,
        TIME_FORMAT(fechaEmision, '%r') as horaE from enc_ticket dt
        inner join clientes c on c.id = dt.idCliente
        inner join areas a on a.id= c.idArea
        inner join sucursales s on s.id = a.idSucursal
        INNER join cajas cj on cj.idSucursal = s.id
        where dt.id = ".$id." and cj.id = ".$idCaja."";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';
        $resultado = $this->con->ejecutar($_query);
        while($fila = $resultado->fetch_assoc()) {
            $object = json_encode($fila);
            
            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '['.$_json .']';
    }

    public function getDetalleTicket($id = 0, $idCaja = 0) {
        $_query = "SELECT *, CONCAT('$ ',round(precio,2)) as precioUni,
        CONCAT('$ ',round((precio * cantidad),2)) as total FROM det_ticket 
        inner join enc_ticket en on en.id = det_ticket.idEncabezado
        inner join clientes c on c.id = en.idCliente
        inner join areas a on a.id= c.idArea
        inner join sucursales s on s.id = a.idSucursal
        INNER join cajas cj on cj.idSucursal = s.id
        where det_ticket.idEncabezado = ".$id." and cj.id = ".$idCaja."";

        $resultado = $this->con->ejecutar($_query);


        $json = '';

        $json.='
            <table style="margin:auto;width: 80%;">
            <thead>
                <tr>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Cantidad</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Producto</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Precio Unitario</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Total</th>
                </tr>
            </thead>
            <tbody>
        ';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<tr> 
                        <td style="height: 30px;">'.$fila["cantidad"].'</td>
                        <td style="height: 30px;">'.$fila["nombreProducto"].'</td>
                        <td style="height: 30px;">'.$fila["precioUni"].'</td>
                        <td style="height: 30px;">'.$fila["total"].'</td>
                      </tr>';
        }

        $json.='</tbody>
            </table>';

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }


    public function anularEstadoTicket($id = 0) {
        $_query = "update enc_ticket set estado =2
        where id = ".$id." ";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
}


?>