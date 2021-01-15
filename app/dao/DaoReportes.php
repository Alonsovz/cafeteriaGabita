<?php 

class DaoReportes extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Cobros();
    }

    public function detalleCliente($idSucursal, $fecha1, $fecha2, $carnet) {
        $_query = "select c.*, a.nombre as area, s.nombre as sucursal,
        case 
        when (
    
            select ROUND(sum(t.total) , 2 )   from clientes cl
             inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            
        ) != ''
        then 
        (
    
          select ROUND(sum(t.total) , 2 )   from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        )
        else 
        '0.00'
        end as gastado,
         case 
        when (
    
            select ROUND(sum(t.efectivoRecibido) - sum(t.cambio), 2 )   from clientes cl
             inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        ) != ''
        then 
        (
    
            select ROUND(sum(t.efectivoRecibido) - sum(t.cambio) , 2 )   from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        )
        else 
        '0.00'
        end as pagoEfectivo,
        case 
        when (
    
            select ROUND(sum(t.descuentoSubsidio) , 2 )   from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
               and t.tipoPago in ('Parcial en subsidio','Subsidio')
        ) != ''
        then 
        (
    
            select ROUND(sum(t.descuentoSubsidio) , 2 )  from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        )
        else 
        '0.00'
        end as gastoSubsidio,
        case 
        when (
    
            select ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 )   from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        ) != ''
        then 
        (
    
            select ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 )  from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        )
        else 
        '0.00'
        end as remanenteSubsidio,
       
       case 
        when (
    
            select ROUND(sum(t.total) , 2 )  from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en planilla','Descuento en planilla')
        ) != ''
        then 
        (
    
            select ROUND(sum(t.total) , 2 )   from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en planilla','Descuento en planilla')
        )
        else 
        '0.00'
        end as descuentoPlanilla,
        
        ROUND(a.cantidadSubsidio , 2 ) as subsidioArea  from clientes c
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        where c.idEliminado = 1 and c.carnet= '".$carnet."'
        and s.id = ".$idSucursal."";

        $resultado = $this->con->ejecutar($_query);


        $json = '';

        $json.='<br>
            <table style="margin:auto;width: 100%;">
            <thead>
                <tr>
                <th style="background-color:#1F0150; color:white;height: 30px;">Carnet</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Cliente</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Área</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Gastado</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Pago en efectivo</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en planilla</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en subsidio</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Remanente subsidio</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Subsidio área</th>
                </tr>
            </thead>
            <tbody>
        ';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<tr> 
                        <td style="height: 30px;">'.$fila["carnet"].'</td>
                        <td style="height: 30px;">'.$fila["nombre"].'</td>
                        <td style="height: 30px;">'.$fila["area"].'</td>
                        <td style="height: 30px;">$ '.$fila["gastado"].'</td>
                        <td style="height: 30px;">$ '.$fila["pagoEfectivo"].'</td>
                        <td style="height: 30px;">$ '.$fila["descuentoPlanilla"].'</td>
                        <td style="height: 30px;">$ '.$fila["gastoSubsidio"].'</td>
                        <td style="height: 30px;">$ '.$fila["remanenteSubsidio"].'</td>
                        <td style="height: 30px;">$ '.$fila["subsidioArea"].'</td>
                      </tr>';
        }

        $json.='</tbody>
            </table>
            ';

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }


    public function detalleClientes($idSucursal, $fecha1, $fecha2) {
        $_query = "select c.*, a.nombre as area, s.nombre as sucursal,
        case 
        when (
    
            select ROUND(sum(t.total) , 2 )   from clientes cl
             inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            
        ) != ''
        then 
        (
    
          select ROUND(sum(t.total) , 2 )   from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        )
        else 
        '0.00'
        end as gastado,
         case 
        when (
    
            select ROUND(sum(t.efectivoRecibido) - sum(t.cambio), 2 )   from clientes cl
             inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        ) != ''
        then 
        (
    
            select ROUND(sum(t.efectivoRecibido) - sum(t.cambio) , 2 )   from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        )
        else 
        '0.00'
        end as pagoEfectivo,
        case 
        when (
    
            select ROUND(sum(t.descuentoSubsidio) , 2 )  from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
               and t.tipoPago in ('Parcial en subsidio','Subsidio')
        ) != ''
        then 
        (
    
            select ROUND(sum(t.descuentoSubsidio) , 2 )   from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        )
        else 
        '0.00'
        end as gastoSubsidio,
        case 
        when (
    
            select ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 )   from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        ) != ''
        then 
        (
    
            select ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 )   from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en subsidio','Subsidio')
        )
        else 
        '0.00'
        end as remanenteSubsidio,
       
       case 
        when (
    
            select ROUND(sum(t.descuentoPlanilla) , 2 )  from clientes cl
              inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en planilla','Descuento en planilla')
        ) != ''
        then 
        (
    
            select ROUND(sum(t.descuentoPlanilla) , 2 )  from clientes cl
            inner join areas a on a.id = cl.idArea
            inner join subsidio sb on sb.idCliente = cl.id
            inner join enc_ticket t on t.idCliente = cl.id
            where cl.idEliminado = 1 and cl.carnet= c.carnet
            and sb.fecha BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
            and t.tipoPago in ('Parcial en planilla','Descuento en planilla')
        )
        else 
        '0.00'
        end as descuentoPlanilla,
        
        ROUND(a.cantidadSubsidio , 2 ) as subsidioArea  from clientes c
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        where c.idEliminado = 1
        and s.id = ".$idSucursal."";

        $resultado = $this->con->ejecutar($_query);


        $json = '';

        $json.='<br>
            <table style="margin:auto;width: 100%;">
            <thead>
                <tr>
                <th style="background-color:#1F0150; color:white;height: 30px;">Carnet</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Cliente</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Área</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Gastado</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Pago en efectivo</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en planilla</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en subsidio</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Remanente subsidio</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Subsidio área</th>
                </tr>
            </thead>
            <tbody>
        ';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<tr> 
                        <td style="height: 30px;">'.$fila["carnet"].'</td>
                        <td style="height: 30px;">'.$fila["nombre"].'</td>
                        <td style="height: 30px;">'.$fila["area"].'</td>
                        <td style="height: 30px;">$ '.$fila["gastado"].'</td>
                        <td style="height: 30px;">$ '.$fila["pagoEfectivo"].'</td>
                        <td style="height: 30px;">$ '.$fila["descuentoPlanilla"].'</td>
                        <td style="height: 30px;">$ '.$fila["gastoSubsidio"].'</td>
                        <td style="height: 30px;">$ '.$fila["remanenteSubsidio"].'</td>
                        <td style="height: 30px;">$ '.$fila["subsidioArea"].'</td>
                      </tr>';
        }

        $json.='</tbody>
            </table>
            ';

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }


    public function detalleProductos($idSucursal, $fecha1, $fecha2) {
        $_query = "select dt.nombreProducto  as prod, count(dt.idProducto) as ventas from det_ticket dt
        inner join enc_ticket et on et.id = dt.idEncabezado
        inner join clientes c on c.id = et.idCliente
        inner join areas a on a.id = c.idArea
        where et.estado = 1 and a.idSucursal = ".$idSucursal."
        and et.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        GROUP by 1 order by 2 desc";

        $resultado = $this->con->ejecutar($_query);


        $json = '';

        $json.='<br>
            <table style="margin:auto;width: 100%;">
            <thead>
                <tr>
                <th style="background-color:#1F0150; color:white;height: 30px;">Producto</th>
                    <th style="background-color:#1F0150; color:white;height: 30px;">Cantidad vendida</th>
                </tr>
            </thead>
            <tbody>
        ';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '<tr> 
                        <td style="height: 30px;">'.$fila["prod"].'</td>
                        <td style="height: 30px;">'.$fila["ventas"].'</td>
                      </tr>';
        }

        $json.='</tbody>
            </table>
            ';

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }
}

?>