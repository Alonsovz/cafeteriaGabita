<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function reportesPagoCuotasAlumno($resultado,$anio,$grado,$alumno)
    {   
        $tabla = '';

        $tabla .= ' <style>
                        td { 
                            text-align: center;
                        }
                        table {
                            width: 100%;
                        }
                        .header {
                            font-family: sans-serif;
                            width: 100%;
                            display: flex;
                            justify-content: flex-end;
                        }
                        .tabla, th, td{
                            border: 1px solid black;
                            border-collapse: collapse;
                            font-family: sans-serif;
                            
                        }
                        
                    </style>';

        

        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:22px;'>
                <font color='#172961'>Talonario de pagos del alumno:<font color='#069319'>  ".$alumno."</font>
                <br><font color='#BA9B1E'> ".$anio." ".$grado." </font>.
               
            </th>
            <th style='border: 1px solid white;'>
            <img src='./res/img/logoMongeRico.jpg' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div>  
            <br>  
            <table class='tabla'>
            <tr>
                <th style='background-color:black;color:white;font-size:18px;'>Mes</th>
                <th style='background-color:black;color:white;font-size:18px;'>Tipo de Pago</th>
                <th style='background-color:black;color:white;font-size:18px;'>Fecha de Pago</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="";

                        if($fila['e']==''){
                            $tabla.="<tr>
                            <td>Enero</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['e']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Enero</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoEnero']."</td></tr>";
                        }
                        else if($fila['e']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Enero</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoEnero']."</td></tr>";
                        }
                        else if($fila['e']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Enero</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoEnero']."</td></tr>";
                        }
                        else if($fila['e']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Enero</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoEnero']."</td></tr>";
                        }
                       
                        if($fila['f']==''){
                            $tabla.="<tr>
                            <td>Febrero</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['f']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Febrero</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoFebrero']."</td></tr>";
                        }
                        else if($fila['f']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Febrero</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoFebrero']."</td></tr>";
                        }
                        else if($fila['f']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Febrero</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoFebrero']."</td></tr>";
                        }
                        else if($fila['f']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Febrero</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoFebrero']."</td></tr>";
                        }
                       

                        if($fila['m']==''){
                            $tabla.="<tr>
                            <td>Marzo</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['m']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Marzo</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoMarzo']."</td></tr>";
                        }
                        else if($fila['m']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Marzo</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoMarzo']."</td></tr>";
                        }
                        else if($fila['m']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Marzo</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoMarzo']."</td></tr>";
                        }
                        else if($fila['m']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Marzo</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoMarzo']."</td></tr>";
                        }
                       

                        if($fila['a']==''){
                            $tabla.="<tr>
                            <td>Abril</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['a']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Abril</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoAbril']."</td></tr>";
                        }
                        else if($fila['a']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Abril</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoAbril']."</td></tr>";
                        }
                        else if($fila['a']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Abril</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoAbril']."</td></tr>";
                        }
                        else if($fila['a']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Abril</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoAbril']."</td></tr>";
                        }
                       


                        if($fila['ma']==''){
                            $tabla.="<tr>
                            <td>Mayo</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['ma']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Mayo</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoMayo']."</td></tr>";
                        }
                        else if($fila['ma']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Mayo</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoMayo']."</td></tr>";
                        }
                        else if($fila['ma']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Mayo</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoMayo']."</td></tr>";
                        }
                        else if($fila['ma']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Mayo</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoMayo']."</td></tr>";
                        }
                       

                        if($fila['ju']==''){
                            $tabla.="<tr>
                            <td>Junio</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['ju']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Junio</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoJunio']."</td></tr>";
                        }
                        else if($fila['ju']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Junio</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoJunio']."</td></tr>";

                        }
                        else if($fila['ju']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Junio</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoJunio']."</td></tr>";
                        }
                        else if($fila['ju']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Junio</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoJunio']."</td></tr>";
                        }
                       

                        if($fila['jul']==''){
                            $tabla.="<tr>
                            <td>Julio</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['jul']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Julio</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoJulio']."</td></tr>";
                        }
                        else if($fila['jul']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Julio</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoJulio']."</td></tr>";
                        }
                        else if($fila['jul']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Julio</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoJulio']."</td></tr>";
                        }
                        else if($fila['jul']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Julio</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoJulio']."</td></tr>";
                        }
                       


                        if($fila['ago']==''){
                            $tabla.="<tr>
                            <td>Agosto</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['ago']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Agosto</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoAgosto']."</td></tr>";
                        }
                        else if($fila['ago']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Agosto</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoAgosto']."</td></tr>";
                        }
                        else if($fila['ago']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Agosto</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoAgosto']."</td></tr>";
                        }
                        else if($fila['ago']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Agosto</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoAgosto']."</td></tr>";
                        }
                       


                        if($fila['sep']==''){
                            $tabla.="<tr>
                            <td>Septiembre</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['sep']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Septiembre</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoSep']."</td></tr>";
                        }
                        else if($fila['sep']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Septiembre</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoSep']."</td></tr>";
                        }
                        else if($fila['sep']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Septiembre</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoSep']."</td></tr>";
                        }
                        else if($fila['sep']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Septiembre</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoSep']."</td></tr>";
                        }
                       

                        if($fila['oc']==''){
                            $tabla.="<tr>
                            <td>Octubre</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['oc']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Octubre</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoOctubre']."</td></tr>";
                        }
                        else if($fila['oc']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Octubre</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                            $tabla.="<td> ".$fila['pagoOctubre']."</td></tr>";
                        }
                        else if($fila['oc']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Octubre</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                            $tabla.="<td> ".$fila['pagoOctubre']."</td></tr>";
                        }
                        else if($fila['oc']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Octubre</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoOctubre']."</td></tr>";
                        }
                       
                    
                        if($fila['nov']==''){
                            $tabla.="<tr>
                            <td>Noviembre</td>
                            <td>No Definido</td>
                            <td>No Definido</td>
                            </tr>";
                        }else if($fila['nov']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<tr><td> Noviembre</td>";
                            $tabla.="<td> Pago Normal</td>";
                            $tabla.="<td> ".$fila['pagoNov']."</td></tr>";
                        }
                        else if($fila['nov']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<tr><td> Noviembre</td>";
                            $tabla.="<td> Pago Adelantado</td>";
                        }
                        else if($fila['nov']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<tr><td> Noviembre</td>";
                            $tabla.="<td> Pago Atrasado</td>";
                        }
                        else if($fila['nov']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<tr><td> Noviembre</td>";
                            $tabla.="<td> Pendiente de recibir Voucher</td>";
                            $tabla.="<td> ".$fila['pagoNov']."</td></tr>";
                            
                        }
                       
                        
                        

                       
                        $tabla.=" </tr>";
        }

        $tabla .= "</table>";
       
        
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
    

}