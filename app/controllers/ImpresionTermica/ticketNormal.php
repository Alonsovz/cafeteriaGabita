<?php


$carnet = $_REQUEST["carnet"];

require_once('../../model/conexion.php');
	$conn=new Conexion();
	$link = $conn->conectar();

	$query="select et.id as idTicket, c.carnet as carnet, c.nombre as cliente, CONCAT('$ ',ROUND(et.total , 2 )) as total,
	CONCAT('$ ',ROUND(et.efectivoRecibido  , 2 )) as efectivoRecibido,
	CONCAT('$ ',ROUND(et.cambio   , 2 )) as cambio ,
	CONCAT('$ ',ROUND(et.descuentoPlanilla   , 2 )) as descuentoPlanilla,
	CONCAT('$ ',ROUND(et.descuentoSubsidio   , 2 )) as descuentoSubsidio,
	DATE_FORMAT(et.fechaEmision,'%d/%m/%Y') as fechaE,
	TIME_FORMAT(et.fechaEmision, '%r') as horaE,
	CONCAT('$ ',ROUND(et.total - et.descuentoPlanilla  , 2 )) as remanentePlanilla,
	CONCAT('$ ',ROUND(et.total - et.descuentoSubsidio  , 2 )) as remanenteSubsidio,
	et.tipoPago as tipoPago,
	a.nombre as area, s.nombre as sucursal
	from enc_ticket et
	inner join clientes c on c.id = et.idCliente
	inner join areas a on a.id = c.idArea
	inner join sucursales s on s.id = a.idSucursal
	where  c.carnet = ".$carnet."
	order by et.id DESC
	LIMIT 1;";
	$encabezado=mysqli_query($link, $query);
	$encTicket=mysqli_query($link, $query);

	$pie=mysqli_query($link, $query);

	$getIdTicket=mysqli_query($link, $query);

	$idTicket = 0;
while ($row=mysqli_fetch_assoc($encTicket)) {
		$idTicket = $row["idTicket"];
	}


	$query2 = "select dt.cantidad as cantidad, dt.nombreProducto as producto,
    CONCAT('$ ',ROUND(dt.precio , 2 )) as precio,
     CONCAT('$ ',ROUND(dt.cantidad * dt.precio, 2 )) as total
      from det_ticket dt where dt.idEncabezado = ".$idTicket."";

	$detalleTicket = mysqli_query($link, $query2);


require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "LR2000"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.

/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("logo.jpg", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
	Ahora vamos a imprimir un encabezado
*/

$printer->text("\n"."Sazón de gabita" . "\n");

$printer->text("-----------------------------" . "\n");
while ($row=mysqli_fetch_assoc($encabezado)) {
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("N° Ticket: ".$idTicket."\n\n");
	$printer->text("Carnet: ".$row["carnet"]."-------Cliente: ".$row["cliente"].".\n\n");
}

$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION    Precio Unitario   Total.\n");
$printer->text("----------------------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/


	/*Alinear a la izquierda para la cantidad y el nombre*/
$printer->setJustification(Printer::JUSTIFY_LEFT);
while ($row1=mysqli_fetch_assoc($detalleTicket)) {
		$printer->text("".$row1["cantidad"]."   ".$row1["producto"]."  ".$row1["precio"]."   ".$row1["total"].".\n");
		$printer->text("----------------------------------------"."\n");
}
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/

$printer->setJustification(Printer::JUSTIFY_RIGHT);

$printer->text("-----------------------------" . "\n");
while ($row=mysqli_fetch_assoc($pie)) {
	$printer->text("Tipo pago: ".$row["tipoPago"]."\n");
	

	if($row["tipoPago"]=='Efectivo'){
		$printer->text("Recibido: ".$row["efectivoRecibido"]."\n");
		$printer->text("Cambio: ".$row["cambio"]."\n");
		$printer->text("-----------------------------" . "\n");
		$printer->text("Total de cuenta: ".$row["total"]."\n");
	}

	if($row["tipoPago"]=='Subsidio'){
		$printer->text("-----------------------------" . "\n");
		$printer->text("Total de cuenta: ".$row["total"]."\n");
	}

	if($row["tipoPago"]=='Parcial en subsidio'){
		$printer->text("Desc. en subisidio: ".$row["descuentoSubsidio"]."\n");
		$printer->text("Remanente: ".$row["remanenteSubsidio"]."\n");
		$printer->text("\nEfectivo: ".$row["efectivoRecibido"]."\n");
		$printer->text("Cambio: ".$row["cambio"]."\n");
		$printer->text("-----------------------------" . "\n");
		$printer->text("Total de cuenta: ".$row["total"]."\n");
	}

	if($row["tipoPago"]=='Descuento en planilla'){
		$printer->text("Desc. en planilla: ".$row["descuentoPlanilla"]."\n");

		$printer->text("-----------------------------" . "\n");
		$printer->text("Total de cuenta: ".$row["total"]."\n");
	}

	if($row["tipoPago"]=='Parcial en planilla'){
		$printer->text("Desc. en subisidio: ".$row["descuentoPlanilla"]."\n");
		$printer->text("Remanente: ".$row["remanentePlanilla"]."\n");
		$printer->text("\nEfectivo: ".$row["efectivoRecibido"]."\n");
		$printer->text("Cambio: ".$row["cambio"]."\n");
		$printer->text("-----------------------------" . "\n");
		$printer->text("Total de cuenta: ".$row["total"]."\n\n");
	}

	
}



/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("\nMuchas gracias por su compra\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();


$printer->close();

?>