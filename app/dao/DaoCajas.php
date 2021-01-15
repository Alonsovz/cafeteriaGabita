<?php 

class DaoCajas extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Cajas();
    }

    public function mostrarcajas() {
        $_query = "select a.*, s.nombre as sucursal from cajas a 
        inner join sucursales s on s.id = a.idSucursal
        where a.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\"  sucursal=\"'.$fila["idSucursal"].'\"  class=\"ui btnEditar icon orange small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }




    public function registrar() {
        $_query = "insert into cajas values(null,'".$this->objeto->getNombre()."',
        ".$this->objeto->getCodigoSucursal().",1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update cajas set nombre ='".$this->objeto->getNombre()."',
        idSucursal = ".$this->objeto->getCodigoSucursal()."
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
    public function eliminar() {
        $_query = "update cajas set idEliminado = 2
        where id=".$this->objeto->getCodigo()."";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function getCajas() {
        $_query = "select a.*, s.nombre as sucursal from cajas a 
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


    public function detalleApertura($caja = 0) {
        $_query = "select  *,
        DATE_FORMAT(fechaApertura,'%d/%m/%Y') as fechaA,
        TIME_FORMAT(fechaApertura, '%r') as horaA,
        DATE_FORMAT(fechaCierre,'%d/%m/%Y') as fechaC,
        TIME_FORMAT(fechaCierre, '%r') as horaC,
        CONCAT('$ ',ROUND(montoCambio , 2 )) as cambio,
        CONCAT('$ ',ROUND(recibidoEfectivo , 2 )) as efectivoR,
        CONCAT('$ ',ROUND(remanente , 2 )) as remanente,
        CONCAT('$ ',ROUND(cambioDado , 2 )) as cambioDado,
        ROUND(remanente , 2 ) as remanenteDecimal,
        ROUND(montoCambio , 2 ) as cambioDecimal
        from aperturaCajas where idCaja = ".$caja."
        order by id desc 
        limit 1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

      

        while($fila = $resultado->fetch_assoc()) {

            if($fila["usuarioCierre"]==null){
                $json .= '<h2>No se ha hecho el cierre anterior</h2>';
            }
            
            else{    

                $json .= '<h4 style="color:purple">Detalles</h4>
                <b style="font-size:13px;"><a style="color:blue">Ultima fecha de apertura:</a> </a>'.$fila["fechaA"].'--'.$fila["horaA"].'</a><br>
                <a style="color:blue">Usuario ultima apertura:</a> </a>'.$fila["usuarioApertura"].'</a><br>

                <a style="color:blue">Ultima fecha de cierre:</a> </a>'.$fila["fechaC"].'--'.$fila["horaC"].'</a><br>
                <a style="color:blue">Usuario cierre:</a> </a>'.$fila["usuarioCierre"].'</a><br>

                <a style="color:blue">Total del ultimo cierre:</a> </a>'.$fila["remanente"].'</a><br></b>
                <input type="hidden" id="remanenteCaja" value="'.$fila["cambioDecimal"].'">
            ';
                
            }
            
        }

       

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }


    public function aperturar($caja = 0, $cambio = 0, $usuario=0) {
        $_query = "insert into aperturaCajas values(null,".$caja.",now(),".$cambio.",'',0,'".$usuario."',
        '',0,0)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function detalleAperturaCierre($caja = 0) {
        $_query = "select  *,
        DATE_FORMAT(fechaApertura,'%d/%m/%Y') as fechaA,
        TIME_FORMAT(fechaApertura, '%r') as horaA,
        DATE_FORMAT(fechaCierre,'%d/%m/%Y') as fechaC,
        TIME_FORMAT(fechaCierre, '%r') as horaC,
        ROUND(montoCambio , 2 ) as cambio,
        ROUND(remanente , 2 ) as remanenteDecimal,
        
        (select ROUND(sum(en.cambio) , 2 ) from enc_ticket en
        inner join clientes c on c.id = en.idCliente
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        inner join cajas ca on ca.idSucursal = s.id
        where ca.id = ".$caja." and 
        fechaEmision >= (select ap.fechaApertura from aperturacajas ap
            where ap.usuarioCierre = ''
            order by ap.id desc limit 1)) as cambioDado,

            (select ROUND(sum(en.efectivoRecibido - en.cambio) , 2 ) from enc_ticket en
        inner join clientes c on c.id = en.idCliente
        inner join areas a on a.id = c.idArea
        inner join sucursales s on s.id = a.idSucursal
        inner join cajas ca on ca.idSucursal = s.id
        where ca.id = ".$caja." and 
        fechaEmision >= (select ap.fechaApertura from aperturacajas ap
            where ap.usuarioCierre = ''
            order by ap.id desc limit 1)) as efectivoRecibido
        from aperturaCajas where idCaja = ".$caja."
        order by id desc 
        limit 1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

      

        while($fila = $resultado->fetch_assoc()) {
            if($fila["usuarioCierre"]==null){
                $total = 0;
                if($fila["cambioDado"] < $fila["cambio"]){
                    $total = ($fila["cambio"]- $fila["cambioDado"]) + $fila["efectivoRecibido"];
                }else{
                    $total = $fila["efectivoRecibido"] +  + $fila["cambio"];
                }
              

                $json .= '<h4 style="color:purple">Detalles</h4>
                <b style="font-size:13px;"><a style="color:blue">Ultima fecha de apertura:</a> </a>'.$fila["fechaA"].'--'.$fila["horaA"].'</a><br>
                <a style="color:blue">Usuario ultima apertura:</a> </a>'.$fila["usuarioApertura"].'</a><br>


                <a style="color:blue">Monto para cambio inicial:</a> </a>$ '.$fila["cambio"].'</a><br>
                <a style="color:blue">Cambio dado:</a> </a> $ '.$fila["cambioDado"].'</a><br>
                <a style="color:blue">Vendido en efectivo:</a> </a>$ '.$fila["efectivoRecibido"].'</a><br>
                <a style="color:green">Total en caja:</a> </a>$ '.number_format($total,2).'</a><br></b>
                
             

                <input type="hidden" id="efectivoCierre" value="'.$fila["efectivoRecibido"].'">
                <input type="hidden" id="cambioDadoCierre" value="'.$fila["cambioDado"].'">
                <input type="hidden" id="cambioDejado" value="'.$fila["cambio"].'">
                <input type="hidden" id="usuarioA" value="'.$fila["usuarioApertura"].'">
                <input type="hidden" id="fechaA" value="'.$fila["fechaApertura"].'">
                <input type="hidden" id="totalReal" value="'.number_format($total,2).'">
            ';
               
            }
          
                 
        
            
        }

       

        $json = substr($json,0, strlen($json) - 1);

        return ''.$json.'';
    }

    public function cerrar($caja,$montoCambio,$usuario, $recibidoEfectivo, $cambioDado,  $remanente, $usuarioA,
    $fechaA) {
        

        $_query = "insert into aperturaCajas values(null,".$caja.",'".$fechaA."',
        ".$montoCambio.",now(),".$recibidoEfectivo.",'".$usuarioA."',
        '".$usuario."',".$cambioDado.",".$remanente.")";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

}



?>