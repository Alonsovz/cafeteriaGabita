
<style>
    body {
        overflow: hidden;
    }
</style>

<script>
$(function() {
    overflowRestore();
});
</script>

<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">
<input type="hidden" id="usuario" value="<?php echo $_SESSION["nomUsuario"] ?>">
<a href="?1=CobrosController&2=gestion"  
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h3>Cobrar</h3>
        <div class="ui divider"></div>
        <img src="./res/img/cashier.png">
</a>

<a id="btnModalCajas" 
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h4>Aperturar Cajas</h4>
        <div class="ui divider"></div>
        <img src="./res/img/cash-register.png">
</a>

<a id="btnModalCajasCerrar" 
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h4>Cerrar Cajas</h4>
        <div class="ui divider"></div>
        <img src="./res/img/save-money.png">
</a>

<a href="?1=ReportesController&2=gestion"  
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h3>Reportes</h3>
        <div class="ui divider"></div>
        <img src="./res/img/report.png">
</a>


<a href="?1=CombosController&2=gestion"  
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h3>Combos</h3>
        <div class="ui divider"></div>
        <img src="./res/img/combos.png">
</a>


<a id="btnModalSubsidio"  
    style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
    color:#854A27;" class="tiles-tiles ui basic inverted segment">
        <h3>Aplicar subsidios</h3>
        <div class="ui divider"></div>
        <img src="./res/img/payment.png">
</a>

</div>

<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=ProductosController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Productos</h3>
            <div class="ui divider"></div>
            <img src="./res/img/productos.png">
        </a>

        <a href="?1=ClientesController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Clientes</h3>
            <div class="ui divider"></div>
            <img src="./res/img/clientes.png">
        </a>

        <a href="?1=UsuarioController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Usuarios</h3>
            <div class="ui divider"></div>
            <img src="./res/img/group.png">
        </a>

        <a href="?1=CajasController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Cajas</h3>
            <div class="ui divider"></div>
            <img src="./res/img/cajas.png">
        </a>

        <a href="?1=AreaController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Áreas</h3>
            <div class="ui divider"></div>
            <img src="./res/img/area.png">
        </a>


        <a href="?1=SucursalesController&2=gestion"  
        style="width: 12%; background-color: #DBDDDD; !important; text-align:center !important;
        color:#854A27;" class="tiles-tiles ui basic inverted segment">
            <h3>Sucursales</h3>
            <div class="ui divider"></div>
            <img src="./res/img/market.png">
        </a>


    
</div>


<div class="ui modal" id="modalAplicarSubsidio" style="width: 700px;">

    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Aplicar subsidios
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
       <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="seven wide field">
                        <label>Mes </label>
                        <select name="mes" id="mes" class="ui dropdown"> 
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="two wide field"></div>
                    <div class="seven wide field">
                        <label>Sucursal</label>
                        <select name="sucursal" id="sucursal" class="ui dropdown">
                            <option value="0" set selected>Seleccione una opción</option>
                            <?php echo $sucursales; ?>
                        </select>
                        <div class="ui red pointing label"  id="labelSucursal"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Selecciona una opción
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="fields">
                    <div class="sixteen wide field" id="detArea">
                        
                    </div>


                    
                </div>
            </div>
       </form>
    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cerrar
            </button>
            <button class="ui teal button" id="btnGuardarSubsidios" >
                Aplicar
            </button>
    </div>
</div>


<div id="modalEspera" class="ui tiny modal">
    <div class="header" style="color:white; background-color:#854a27">

    </div>
    <div class="content" style="background-color:#DBDDDD; text-align:center">
    <h1>Estamos guardando la información</h1>
    <div class="lds-roller">
        <div></div><div></div><div></div><div>
        </div><div></div><div></div><div></div>
        <div></div></div>
    </div>

</div>


<div class="ui modal" id="modalAperturarCajas" style="width: 700px;">

    <div class="header" style="background-color:#024D54; color:white;">
    <i class="box icon"></i><i class="dollar sign icon"></i> Aperturar Caja
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
       <form class="ui form">
            <div class="field">
                <div class="fields">
                   
                    <div class="seven wide field">
                            <label>Caja </label>
                            <select name="caja" id="caja" class="ui dropdown">
                                <option value="0" set selected>Seleccione una opción</option>
                                <?php echo $cajas; ?>
                            </select>
                            <div class="ui red pointing label"  id="labelCaja"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Selecciona una opción
                        </div>
                    </div>

                    <div class="nine wide field" id="detCaja">
                    
                    </div>
                </div>
            </div>

            <div class="field divAbre">
                <div class="fields">
                        <div class="sixteen wide field">
                            <h3 style="color:green">Detalles nueva apertura</h3>
                        </div>
                    </div>
            </div>
            <div class="field divAbre">
                <div class="fields">
                        <div class="eight wide field">
                            <label>Nuevo monto para cambio</label>
                            <input type="text" name="nuevoCambio" id="nuevoCambio" placeholder="Nuevo monto para cambio">
                        </div>
                        <div class="eight wide field">
                            <label>Total de monto para cambio</label>
                            <input type="text" name="totalNuevoCambio" id="totalNuevoCambio" placeholder="Total de monto para cambio" readonly>
                        </div>
                    
                </div>
            </div>
       </form>
    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cancelar
            </button>
            <button class="ui teal button" id="btnAperturarCaja" >
                Aperturar
            </button>
    </div>
</div>


<div class="ui modal" id="modalCerrarCajas" style="width: 700px;">

    <div class="header" style="background-color:#024D54; color:white;">
    <i class="box icon"></i><i class="dollar sign icon"></i> Cerrar Caja
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
       <form class="ui form">
            <div class="field">
                <div class="fields">
                   
                    <div class="seven wide field">
                            <label>Caja </label>
                            <select name="cajaCierre" id="cajaCierre" class="ui dropdown">
                                <option value="0" set selected>Seleccione una opción</option>
                                <?php echo $cajas; ?>
                            </select>
                            <div class="ui red pointing label"  id="labelCajaCierre"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Selecciona una opción
                        </div>
                    </div>

                    <div class="nine wide field" id="detCajaCierre">
                    
                    </div>
                </div>
            </div>

            <div class="field divCierre" style="display:none;">
                <div class="fields">
                        <div class="sixteen wide field">
                            <h3 style="color:green">Detalles de cierre</h3>
                        </div>
                    </div>
            </div>
            <div class="field divCierre">
                <div class="fields">
                        <div class="eight wide field">
                            <label>Efectivo recibido</label>
                            <input type="text" name="efectivoRecibido" id="efectivoRecibido" placeholder="Efectivo Recibido">
                        </div>
                    
                        <div class="eight wide field">
                            <label>Sobrante de cambio</label>
                            <input type="text" name="sobrantecambio" id="sobrantecambio" placeholder="Sobrante de cambio" readonly>
                        </div>

                        <div class="eight wide field">
                            <label>Total de caja</label>
                            <input type="text" name="totalCaja" id="totalCaja" placeholder="Total de caja" readonly>
                        </div>
                </div>
            </div>
       </form>
    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cancelar
            </button>
            <button class="ui teal button" id="btnCerrarCaja" >
                Cerrar caja
            </button>
    </div>
</div>
<style>
        .lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    }
    .lds-roller div {
    animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    transform-origin: 40px 40px;
    }
    .lds-roller div:after {
    content: " ";
    display: block;
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: black;
    margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
    animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
    top: 63px;
    left: 63px;
    }
    .lds-roller div:nth-child(2) {
    animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
    top: 68px;
    left: 56px;
    }
    .lds-roller div:nth-child(3) {
    animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
    top: 71px;
    left: 48px;
    }
    .lds-roller div:nth-child(4) {
    animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
    top: 72px;
    left: 40px;
    }
    .lds-roller div:nth-child(5) {
    animation-delay: -0.12s;
    }
    .lds-roller div:nth-child(5):after {
    top: 71px;
    left: 32px;
    }
    .lds-roller div:nth-child(6) {
    animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
    top: 68px;
    left: 24px;
    }
    .lds-roller div:nth-child(7) {
    animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
    top: 63px;
    left: 17px;
    }
    .lds-roller div:nth-child(8) {
    animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
    top: 56px;
    left: 12px;
    }
    @keyframes lds-roller {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

</style>
<script>

$('#btnModalSubsidio').click(function() {
$("#sucursal").dropdown('set selected', '0');
$("#detArea").hide();
$("#detArea").html('');

$('#modalAplicarSubsidio').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$('#btnModalCajas').click(function() {
    $(".divAbre").hide();
$("#caja").dropdown('set selected', '0');
$("#totalNuevoCambio").val('');
$("#nuevoCambio").val('');
$("#detCaja").html('');
$('#modalAperturarCajas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$('#btnModalCajasCerrar').click(function() {
$("#cajaCierre").dropdown('set selected', '0');
$("#efectivoRecibido").val('');
$(".divCierre").hide();
$("#detCajaCierre").html('');
$('#modalCerrarCajas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

    $(document).ready(function(){

        $('#totalNuevoCambio').mask("###0.00", {reverse: true});
        $('#nuevoCambio').mask("###0.00", {reverse: true});
        $('#efectivoRecibido').mask("###0.00", {reverse: true});

        var d = new Date();
        var n = d.getMonth();

        if(n == '0'){
            $("#mes").dropdown("set selected","01");
        }
        if(n == '1'){
            $("#mes").dropdown("set selected","02");
        }
        if(n == '2'){
            $("#mes").dropdown("set selected","03");
        }
        if(n == '3'){
            $("#mes").dropdown("set selected","04");
        }
        if(n == '4'){
            $("#mes").dropdown("set selected","05");
        }
        if(n == '5'){
            $("#mes").dropdown("set selected","06");
        }
        if(n == '6'){
            $("#mes").dropdown("set selected","07");
        }
        if(n == '7'){
            $("#mes").dropdown("set selected","08");
        }
        if(n == '8'){
            $("#mes").dropdown("set selected","09");
        }
        if(n == '9'){
            $("#mes").dropdown("set selected","10");
        }
        if(n == '10'){
            $("#mes").dropdown("set selected","11");
        }
        if(n == '11'){
            $("#mes").dropdown("set selected","12");
        }

    });


    $("#sucursal").change(function(){
        if($(this).val()=='0'){
            $("#labelSucursal").css("display","none");
        }else{
            $("#labelSucursal").css("display","none");
        $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=AreaController&2=detalleArea',
                data: {
                    idSucursal:$("#sucursal").val(),
                },
                success: function(r) {
                   
                        $("#detArea").html(r);
                        $("#detArea").show();
                }
        });
        }
        
    });


    $("#btnGuardarSubsidios").click(function(){
        $("#modalAplicarSubsidio").modal('hide');

        if($("#sucursal").val()=='0'){
            $("#labelSucursal").css("display","block");
        }else{
                //$("#modalAplicarSubsidio").modal('hide');
               
                $.ajax({
                        cache: false,
                        type: 'POST',
                        url: '?1=UsuarioController&2=aplicarSubsidio',
                        data: {
                            idSucursal:$("#sucursal").val(),
                            mes:$("#mes").val(),
                        },
                        success: function(r) {
                        if(r == 1){
                            //$("#modalEspera").modal('hide');

                            swal({
                                title: 'Subsidios aplicados',
                                text: 'Guardado con éxito',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 2000
                                });
                                

                        }else{
                            //$("#modalEspera").modal('hide');
                            swal({
                                title: 'Subsidios no aplicados',
                                text: 'Ya se aplicaron en este mes para todos los clientes',
                                type: 'error',
                                showConfirmButton: false,
                                timer: 2000
                                });
                                
                        }
                            
                        }
                });
        }
        
    });


    $("#caja").change(function(){
        $("#nuevoCambio").val('');
        $("#totalNuevoCambio").val('');
        if($(this).val()=='0'){
            $("#labelCaja").css("display","none");
        }else{
            $("#labelCaja").css("display","none");
        $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=CajasController&2=detalleApertura',
                data: {
                    idCaja:$("#caja").val(),
                },
                success: function(r) {
                   
                    if(r==''){
                        $("#detCaja").html('<h2>No se ha aperturado nunca</h2>');
                        $(".divAbre").hide();
                    }
                   
                    else{
                        $("#detCaja").html(r);
                        $(".divAbre").show();
                    }
                       
                }
        });
        }
        
    });



    $("#nuevoCambio").keyup(function(){
        
        
        if($("#detCaja").html()=='<h2>No se ha aperturado nunca</h2>'){
            var camNuevo = $(this).val();
            
            $("#totalNuevoCambio").val(camNuevo);
        }else{
            var camNuevo = $(this).val();
            var remanenteCaja = $("#remanenteCaja").val();

            var total = parseFloat(camNuevo) + parseFloat(remanenteCaja);
            $("#totalNuevoCambio").val(total.toFixed(2));

        }
    });


    $("#cajaCierre").change(function(){
        $("#nuevoCambio").val('');
        $("#totalNuevoCambio").val('');
        if($(this).val()=='0'){
            $("#labelCaja").css("display","none");
        }else{
            $("#labelCaja").css("display","none");
        $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=CajasController&2=detalleAperturaCierre',
                data: {
                    idCaja:$("#cajaCierre").val(),
                },
                success: function(r) {
                   
                    if(r==''){
                        $("#detCajaCierre").html('<h2>No se ha aperturado nunca</h2>');
                        $(".divCierre").hide();
                    }else{
                        $("#detCajaCierre").html(r);
                        $(".divCierre").show();
                    }
                       
                }
        });
        }
        
    });


    $("#btnAperturarCaja").click(function(){
        var cambio = $("#totalNuevoCambio").val();
        var idCaja = $("#caja").val();
        var usuario = $("#usuario").val();

      //console.log(cambio, idCaja, usuario);

      $.ajax({
        cache: false,
        type: 'POST',
        url: '?1=CajasController&2=aperturar',
        data: {
            cambio:cambio,
            idCaja:idCaja,
            usuario:usuario,
        },
        success: function(r) {
            if(r==1){
                $('#modalAperturarCajas').modal('hide');
                swal({
                                title: 'Caja Aperturada',
                                text: 'No olvides hacer el cierre',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 2000
                                });
            }
        }
});

    });



    $("#efectivoRecibido").keyup(function(){
        var efectivoRecibido = $(this).val();
        var efectivoVendido = $("#efectivoCierre").val();
        var cambioDadoCierre = $("#cambioDadoCierre").val();
        var cambioDejado = $("#cambioDejado").val();

        var sobranteCambio = parseFloat(cambioDejado) - parseFloat(cambioDadoCierre);

        var totalCaja = sobranteCambio + parseFloat(efectivoRecibido);

        $("#sobrantecambio").val(sobranteCambio.toFixed(2));
        $("#totalCaja").val(totalCaja.toFixed(2));
    });


$("#btnCerrarCaja").click(function(){
        var montoCambio = $("#sobrantecambio").val();
        var recibidoEfectivo  = $("#efectivoRecibido").val();
        var usuario = $("#usuario").val();
        var cambioDado = $("#cambioDadoCierre").val();
        var remanente = $("#totalCaja").val();
        var idCaja = $("#cajaCierre").val();
        var usuarioA = $("#usuarioA").val();
        var fechaA = $("#fechaA").val();

      $.ajax({
        cache: false,
        type: 'POST',
        url: '?1=CajasController&2=cerrar',
        data: {
            montoCambio:montoCambio,
            idCaja:idCaja,
            usuario:usuario,
            recibidoEfectivo:recibidoEfectivo,
            cambioDado:cambioDado,
            remanente:remanente,
            fechaA:fechaA,
            usuarioA: usuarioA,
        },
        success: function(r) {
            if(r==1){
                $('#modalCerrarCajas').modal('hide');
                swal({
                                title: 'Caja cerrada',
                                text: 'No olvides hacer la apertura',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 2000
                                });
            }
        }
});
});
</script>

