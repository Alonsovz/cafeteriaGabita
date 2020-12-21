<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function reportesPagoCuotas($resultado,$anio,$grado)
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
            <th style='border: 1px solid white; font-size:28px;'>
                <font color='#172961'>Reporte de cuotas de pagos de: ".$grado." ".$anio."<font color='#BA9B1E'></font>.
               
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
                <th bgcolor='#25F1E1'>N°</th>
                <th bgcolor='#25F1E1'>Alumno</th>
                <th bgcolor='#25F1E1'>N° Talonario</th>
                <th bgcolor='#25F1E1'>E</th>
                <th bgcolor='#25F1E1'>F</th>
                <th bgcolor='#25F1E1'>M</th>
                <th bgcolor='#25F1E1'>A</th>
                <th bgcolor='#25F1E1'>M</th>
                <th bgcolor='#25F1E1'>J</th>
                <th bgcolor='#25F1E1'>J</th>
                <th bgcolor='#25F1E1'>A</th>
                <th bgcolor='#25F1E1'>S</th>
                <th bgcolor='#25F1E1'>O</th>
                <th bgcolor='#25F1E1'>N</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>1</td>
                        <td>".$fila['nombre']."</td>
                        <td> ".$fila['talonario']."</td>";

                        if($fila['e']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['e']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['e']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['e']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['e']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       
                        if($fila['f']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['f']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['f']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['f']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['f']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       

                        if($fila['m']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['m']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['m']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['m']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['m']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       

                        if($fila['a']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['a']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['a']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['a']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['a']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       


                        if($fila['ma']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['ma']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['ma']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['ma']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['ma']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       

                        if($fila['ju']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['ju']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['ju']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['ju']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['ju']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       

                        if($fila['jul']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['jul']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['jul']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['jul']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['jul']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       


                        if($fila['ago']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['ago']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['ago']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['ago']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['ago']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       


                        if($fila['sep']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['sep']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['sep']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['sep']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['sep']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       

                        if($fila['oc']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['oc']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['oc']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['oc']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['oc']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
                        }
                       
                    
                        if($fila['nov']==''){
                            $tabla.="<td> </td>";
                        }else if($fila['nov']=="<i class='close icon' style='font-size:30px;'></i>"){
                            $tabla.="<td> PN</td>";
                        }
                        else if($fila['nov']=="<i class='window close outline icon' style='font-size:30px;color:blue;'></i>"){
                            $tabla.="<td> P-AD</td>";
                        }
                        else if($fila['nov']=="<i class='window close outline icon' style='font-size:30px;color:red;'></i>"){
                            $tabla.="<td> P-AT</td>";
                        }
                        else if($fila['nov']=="<i class='search icon' style='font-size:30px;color:orange;'></i>"){
                            $tabla.="<td> P-RV</td>";
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