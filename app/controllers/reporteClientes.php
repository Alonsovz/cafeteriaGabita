<?php 

$idSucursal = $_REQUEST["idSucursal"];
$fecha1 = $_REQUEST["fecha1"];
$fecha2 = $_REQUEST["fecha2"];

$fecha1VE = date_create_from_format('Y-m-d',$fecha1);

    $fechaCreacion1E = date_format($fecha1VE,'mY');

header("Pragma: public");
header("Expires: 0");
$filename = "reporteVentas".$fechaCreacion1E.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


require_once('../model/conexion.php');
	$conn=new Conexion();
	$link = $conn->conectar();

	$query="select c.*, a.nombre as area, s.nombre as sucursal,
    case 
    when (

        select ROUND(sum(t.total) , 2 )   from clientes cl
         inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        
    ) != ''
    then 
    (

      select ROUND(sum(t.total) , 2 )   from clientes cl
          inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
    )
    else 
    '0.00'
    end as gastado,
     case 
    when (

        select ROUND(sum(t.efectivoRecibido) - sum(t.cambio), 2 )   from clientes cl
         inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
    ) != ''
    then 
    (

        select ROUND(sum(t.efectivoRecibido) - sum(t.cambio) , 2 )   from clientes cl
        inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
    )
    else 
    '0.00'
    end as pagoEfectivo,
    case 
    when (

        select ROUND(sum(t.descuentoSubsidio) , 2 )  from clientes cl
          inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
           and t.tipoPago in ('Parcial en subsidio','Subsidio')
    ) != ''
    then 
    (

        select ROUND(sum(t.descuentoSubsidio) , 2 )   from clientes cl
        inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
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
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        and t.tipoPago in ('Parcial en subsidio','Subsidio')
    ) != ''
    then 
    (

        select ROUND(a.cantidadSubsidio - sum(t.descuentoSubsidio) , 2 )   from clientes cl
        inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
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
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
        and t.fechaEmision BETWEEN '".$fecha1." 00:00:00' and '".$fecha2." 23:59:59'
        and t.tipoPago in ('Parcial en planilla','Descuento en planilla')
    ) != ''
    then 
    (

        select ROUND(sum(t.descuentoPlanilla) , 2 )  from clientes cl
        inner join areas a on a.id = cl.idArea
        
        inner join enc_ticket t on t.idCliente = cl.id
        where cl.idEliminado = 1 and cl.carnet= c.carnet
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
    $result=mysqli_query($link, $query);


    $fecha1V = date_create_from_format('Y-m-d',$fecha1);

    $fechaCreacion1 = date_format($fecha1V,'d/m/Y');

    $fecha2V = date_create_from_format('Y-m-d',$fecha2);

    $fechaCreacion2 = date_format($fecha2V,'d/m/Y');
    

    $totalGastado = 0;
    $totalEfectivo = 0;
    $totalPlanilla = 0;
    $totalSubsidio = 0;
    $totalRemanente = 0;
?>


<h3 style="text-align:center;">Reporte de ventas entre las fechas <?php echo $fechaCreacion1; ?> y <?php echo $fechaCreacion2; ?></h3>
<table>
<thead>
    <tr>
        <th style="background-color:#1F0150; color:white;height: 30px;">Carnet</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Cliente</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Area</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Gastado</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Pago en efectivo</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en planilla</th>
        <th style="background-color:#1F0150; color:white;height: 30px;">Descuento en subsidio</th>
    </tr>
</thead>
<tbody> 
<?php
while ($row=mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td style="border: 1px solid black;"><?php echo $row['carnet'];?></td>
            <td style="border: 1px solid black;"><?php echo  utf8_decode($row['nombre']);?></td>
            <td style="border: 1px solid black;"><?php echo  utf8_decode($row['area']);?></td>
            <td style="border: 1px solid black;">$ &nbsp;<?php echo $row['gastado']; 
             $totalGastado+=$row['gastado']; ?></td>
            <td style="border: 1px solid black;">$ &nbsp;<?php echo $row['pagoEfectivo'];$totalEfectivo+=$row['pagoEfectivo'];?></td>
            <td style="border: 1px solid black;">$ &nbsp;<?php echo $row['descuentoPlanilla'];$totalPlanilla+=$row['descuentoPlanilla'];?></td>
            <td style="border: 1px solid black;">$ &nbsp;<?php echo $row['gastoSubsidio'];$totalSubsidio+=$row['gastoSubsidio'];?></td>
        </tr>
</tbody>

<?php
}
?>

<tfoot>
    <tr>
        <td style="border: 1px solid black; color:white; background-color:#01653F;text-align:right;" colspan="3">TOTALES</td>
        <td style="border: 1px solid black;">$ &nbsp;<?php echo number_format($totalGastado,2);?></td>
        <td style="border: 1px solid black;">$ &nbsp;<?php echo number_format($totalEfectivo,2);?></td>
        <td style="border: 1px solid black;">$ &nbsp;<?php echo number_format($totalPlanilla,2);?></td>
        <td style="border: 1px solid black;">$ &nbsp;<?php echo number_format($totalSubsidio,2);?></td>
    </tr>
</tfoot>
</table>
 