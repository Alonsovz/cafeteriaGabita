<div id="app">
    <div class="ui grid">

        <div class="row title-bar">
            <div class="sixteen wide column">
                        <label style="font-weight:bold;font-size: 15px;">Seleccione caja a utilizar: </label> &nbsp;
                        <select name="caja" id="caja" class="ui dropdown">
                            <option value="0" set selected>Seleccione una opción</option>
                            <?php echo $cajas; ?>
                        </select>

                        <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION["nomUsuario"] ?>">
           <a style="color:black; font-size: 15px;color:blue;font-weight:bold;align:right; float:right;" id="nombreCaja"></a>
            <a style="color:black; font-size: 15px;font-weight:bold;display:none;align:right; float:right;" class="divProductos">Caja: &nbsp; </a>
               
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
            
                <div class="ui divider"></div>
            </div>
        </div>
    </div>
    <br>
    <div id="vista">
               
                <form id="frmCliente" class="ui form" method="POST" method="POST" enctype="multipart/form-data">
                
                    <div class="field">
                        <div class="fields">
                            <div class="three wide field">
                                <label> <i class="address card icon"></i> Carnet de cliente</label>
                                <input type="text" id="carnet" name="carnet" placeholder="Ingrese el carnet">
                            </div>
                        
                            <div class="three wide field divNombre"  style="display:none">
                                    <a  id="nombreCliente" style="color:green; font-weight:bold;"></a><br>
                                    <a  id="areaCliente" style="color:green; font-weight:bold;"></a><br>
                                    <a  id="sucursalCliente" style="color:green; font-weight:bold;"></a>
                            </div> 

                            <div class="three wide field">
                                <label> <i class="barcode icon"></i> Código Producto</label>
                                <input type="text" id="codigoProducto" name="codigoProducto">
                            </div>

                            <div class="three wide field">
                                <label> <i class="pencil icon"></i> Nombre Producto</label>
                                <input type="text" id="nombreProducto" name="nombreProducto">
                            </div>

                            <div class="three wide field">
                                <label> <i class="dollar sign icon"></i> Precio Producto</label>
                                <input type="text" id="precioProducto" name="precioProducto">
                                <input type="hidden" id="precioProductoDecimal" name="precioProductoDecimal">
                                <div class="ui red pointing label"  id="labelPrecio"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Asigna un precio</div>
                                
                            </div>

                            <div class="three wide field">
                                <label> <i class="plus icon"></i> Cantidad</label>
                                <input type="number" id="cantidadProducto" name="cantidadProducto" value="1">
                            </div>

                         </div>  


                         <div class="fields">
                         <div class="five wide field">
                            </div>
                            <div class="eleven wide field" id="combos">
                                
                            </div>
                         </div>  
                   
                </form>

              
        <div class="ui divider"></div>

            <div class="field divProductos" style="display:none;">
                <div class="fields">
                    <div class="five wide field">
                        <table class="ui table" id="dtProductosCobro" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="background-color: #8E2800; color:white;">id</th>
                                    <th style="background-color: #8E2800; color:white;">Código</th>
                                    <th style="background-color: #8E2800; color:white;">Nombre</th>
                                    <th style="background-color: #8E2800; color:white;">Precio</th>
                                    <th style="background-color: #8E2800; color:white;"><i class="arrow up icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    
                    

                    <div class="eight wide field divLista" style="display:none;">
                    <a style="font-weight: bold; font-size: 16px; color: #854a27;margin-left:30px;">Total:</a>

                    <a style="font-weight: bold; font-size: 18px; color: black;" id="totalCuenta"></a>

                        <form action="" class="ui form" id="frmLista" >
                                <table class="ui selectable very compact celled table" style="width:90%; margin:auto;">
                                        <thead>
                                            <tr>
                                                <th style="background-color: #185402; color:white;"><i class="barcode icon"></i>Codigo</th>
                                                <th style="background-color: #185402; color:white;"><i class="pencil  icon"></i>Nombre</th>
                                                <th style="background-color: #185402; color:white;"><i class="dollar sign icon"></i>Precio</th>
                                                <th style="background-color: #185402; color:white;"><i class="plus icon"></i>Cantidad</th>
                                                <th style="background-color: #185402; color:white;"><i class="trash icon"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(lista, index) in listas">
                                            <td>  
                                            <input class="requerido" readonly v-model="lista.codigoProductoL" name="codigoProductoL"
                                            id="codigoProductoL" type="text">
                                            </td>
                                        
                                            <td>  
                                            <input class="requerido" readonly v-model="lista.nombreProductoL" name="nombreProductoL"
                                            id="nombreProductoL" type="text">
                                            </td> 

                                            <td>  
                                            <input class="requerido" readonly v-model="lista.precioProductoL" name="precioProductoL"
                                            id="precioProductoL" type="text">
                                            <input class="requerido" readonly v-model="lista.precioProductoDecimalL" name="precioProductoDecimalL"
                                            id="precioProductoDecimalL" type="hidden">
                                            </td>

                                            <td>  
                                            <input class="requerido" readonly v-model="lista.cantidadProductoL" name="cantidadProductoL"
                                            id="cantidadProductoL" type="text">
                                            </td>
                                            
                                            <td>
                                            <center>
                            </form>
                              <a  @click="eliminarDetalleLista(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></a>
                                  </center>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    </div>

                    <div class="three wide field divLista" style="text-align:left;display:none;">
                        <a style="font-weight: bold; font-size: 16px; color: #010187;margin-left:20px;">Tipo de pago:</a>
                        <br><br>

                        <input type="checkbox" id="efectivo" name="efectivo" value="Efectivo">
                        <labels style="font-weight:bold;color:#981700;"> Efectivo</label><br>
                            <div id="divEfectivo" style="display:none;">
                                <form class="ui form" id="frmEfectivo">
                                <div class="fields">
                                    <div class="field">
                                        <div class="sixteen wide field">
                                            <label>Recibido: </label>
                                            <input type="text" name="cantidadEfectivo" id="cantidadEfectivo" 
                                            placeholder="Efectivo recibido">
                                        </div>

                                        <div class="sixteen wide field">
                                            <label>Cambio: </label>
                                            <input type="text" name="cambio" id="cambio" 
                                            placeholder="Cambio" readonly>
                                        </div>
                                    </div>
                                </div>
                                    
                                </form>

                                
                                <a class="ui green button" id="btnCobroEfectivo">Cobrar</a>
                                <br><br>
                            </div>
                            

                        <input type="checkbox" id="credito" name="credito" value="Crédito">
                        <label style="font-weight:bold;color:#981700;"> Crédito</label><br>

                        <input type="checkbox" id="parcialPlanilla" name="parcialPlanilla" value="Parcial Planilla">
                        <label style="font-weight:bold;color:#981700;">Parcial en planilla</label><br>
                            <div id="divParcialPlanilla" style="display:none;">
                                    <form class="ui form">
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Descuento planilla: </label>
                                                <input type="text" name="descuentoPPlanilla" id="descuentoPPlanilla" 
                                                placeholder="Descuento planilla" style="height:12px; font-size:13px;">
                                            </div>
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Remanente cuenta actual: </label>
                                                <input type="text" name="RemanentePPlanilla" id="RemanentePPlanilla" 
                                                placeholder="Remanente cuenta" style="height:12px; font-size:13px;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Efectivo: </label>
                                                <input type="text" name="cantidadEfectivoPPlanilla" id="cantidadEfectivoPPlanilla" 
                                                placeholder="Efectivo recibido" style="height:12px; font-size:13px;">
                                            </div>

                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Cambio: </label>
                                                <input type="text" name="cambioPPlanilla" id="cambioPPlanilla" 
                                                placeholder="Cambio" readonly style="height:12px; font-size:13px;">
                                            </div>
                                        </div>
                                    </div>
                                        
                                    </form>

                                    
                                    <a class="ui green button" id="btnCobroDescuentoPPlanilla">Cobrar</a>
                                    <br><br>
                            </div>

                        <input type="checkbox" id="parcialSubsidio" name="parcialSubsidio" value="Parcial Subsidio">
                        <label style="font-weight:bold;color:#981700;">Parcial con subsidio</label><br>

                        <input type="checkbox" id="descPlanilla" name="descPlanilla" value="descPlanilla">
                        <label style="font-weight:bold;color:#981700;">Descuento en planilla</label>

                        <div id="divPlanilla" style="display:none;">
                                    
                                    <a class="ui green button" id="btnCobroDescuentoPlanilla">Cobrar</a>
                            </div>


                    </div>

                    </div>
                </div>
            </div>

        </div>
</div>
</div>
<script src="./res/tablas/tablaProductosCobro.js"></script>

<script>
               $('#codigoProducto').keypress(function(e) {
                 if (e.keyCode == '13') {
                    e.preventDefault();
                  }
               })

               $('#nombreProducto').keypress(function(e) {
                 if (e.keyCode == '13') {
                    e.preventDefault();
                    //your code here
                  }
               })

               $('#codigoProducto').keypress(function(e) {
                 if (e.keyCode == '13') {
                    e.preventDefault();
                  }
               })

               $('#cantidadProducto').keypress(function(e) {
                 if (e.keyCode == '13') {
                    e.preventDefault();
                    //your code here
                  }
               })
</script>

<script>


var app = new Vue({
        el: "#app",
        data: {
            listas: [{
                codigoProductoL:'',
                nombreProductoL: '',
                precioProductoL: '',
                precioProductoDecimalL:'',
                cantidadProductoL:'',
            }],
        },
        methods: {
            eliminarDetalleLista(index) {
                this.listas.splice(index, 1);
                $("#totalCuenta").text("$ "+this.totalCuenta());
            },
            agregarDetalleLista() {
                this.listas.push({
                    codigoProductoL: $("#codigoProducto").val(),
                    nombreProductoL: $("#nombreProducto").val(),
                    precioProductoL : $("#precioProducto").val(),
                    precioProductoDecimalL: $("#precioProductoDecimal").val(),
                    cantidadProductoL : $("#cantidadProducto").val(),
                });
            
            },

            totalCuenta() { 
                let acum = 0
                this.listas.forEach(p => {
                    acum += parseFloat(p.precioProductoDecimalL) * parseFloat(p.cantidadProductoL)
                })
                return acum.toFixed(2);
            },
            cargarDatos() {
                var id = $("#carnet").val();

                fetch("?1=CobrosController&2=getDatosCliente&carnet=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {
                        $('#nombreCliente').text(dat.nombre);
                        $('#areaCliente').text(dat.area);
                        $('#sucursalCliente').text(dat.sucursal);
                        $(".divNombre").show();
                    })
                    .catch(err => {
                        $('#nombreCliente').text('');
                        $('#areaCliente').text('');
                        $('#sucursalCliente').text('');
                        $(".divNombre").hide();
                    });
            },

            cargarDatosCodigo() {
                var codigo = $("#codigoProducto").val();
                var caja = $("#caja").val();

                fetch("?1=CobrosController&2=getDatosProductoCodigo&codigo=" + codigo+"&caja=" + caja)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {
                        $('#nombreProducto').val(dat.nombre);
                        $('#precioProducto').val(dat.precioTabla);
                        $('#precioProductoDecimal').val(dat.precioDecimal);
                    })
                    .catch(err => {
                        $('#nombreProducto').val('');
                        $('#precioProducto').val('');
                        $('#precioProductoDecimal').val('');
                    });
            },

            cargarDatosNombre() {
                var nombre = $("#nombreProducto").val();
                var caja = $("#caja").val();

                fetch("?1=CobrosController&2=getDatosProductoNombre&nombre=" + nombre+"&caja=" + caja)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {
                        $('#codigoProducto').val(dat.codigo);
                        $('#precioProducto').val(dat.precioTabla);
                        $('#precioProductoDecimal').val(dat.precioDecimal);
                        $("#cantidadProducto").val(1);
                    })
                    .catch(err => {
                        $('#codigoProducto').val('');
                        $('#precioProducto').val('');
                        $('#precioProductoDecimal').val('');
                        $("#cantidadProducto").val(1);
                    });
            },
            cargarDatosCombo(nombre,sucursal) {

                fetch("?1=CombosController&2=getDatosCombosCobro&nombre="+nombre+"&sucursal=" + sucursal)
                .then(response => {
                    return response.json();
                })
                .then(dat => {

                    dat.forEach(element => {
                        this.listas.push({
                        codigoProductoL: element["codigo"],
                        nombreProductoL: element["nombre"],
                        precioProductoL : element["precioTabla"],
                        precioProductoDecimalL: element["precioDecimal"],
                        cantidadProductoL : element["cantidad"],
                    });
                    
                $("#totalCuenta").text("$ "+app.totalCuenta());
                });
                        
                    })
                    .catch(err => {
                    });
            },
            limpiar(){
                this.listas = [];
            },
            guardarCobroDetalle() {

                if (this.listas.length) {

                    $('#frmLista').addClass('loading');
                    $.ajax({
                        type: 'POST',
                        data: {
                            lista: JSON.stringify(this.listas)
                        },
                        url: '?1=CobrosController&2=guardarDetalle',
                        success: function (r) {
                            $('#frmLista').removeClass('loading');
                            if (r == 1) {

                                swal({
                                    title: 'Cobro Registradao',
                                    text: 'Se imprimirá el ticket',
                                    type: 'success',
                                    showConfirmButton: false,
                                        timer: 1500
                                }).then((result) => {
                                    if (result.value) {
                                        location.href = '?';
                                    }
                                }); 
                                app.limpiar();             
                            }
                            
                        }
                    });
                }

            },
        }
    });

    function limpiar(){
        $('#codigoProducto').val('');
        $('#precioProducto').val('');
        $('#precioProductoDecimal').val('');
        $("#cantidadProducto").val(1);
        //$("#carnet").val();
    }

    $(document).ready(function(){
        app.eliminarDetalleLista(0);
        var total = 0;

        $('#precioProducto').mask("###0.00", {reverse: true});
        $('#precioProductoDecimal').mask("###0.00", {reverse: true});

        $('#cantidadEfectivo').mask("###0.00", {reverse: true});
        $('#cambio').mask("###0.00", {reverse: true});

        $("#descuentoPPlanilla").mask("###0.00", {reverse: true});
        $("#RemanentePPlanilla").mask("###0.00", {reverse: true});
        $("#cantidadEfectivoPPlanilla").mask("###0.00", {reverse: true});
        $("#cambioPPlanilla").mask("###0.00", {reverse: true});


        $("#caja").change(function(){
            app.listas = [];
            limpiar();

            $("#totalCuenta").text("$ 0.00");
            var text = $("#caja option:selected").text();

           
            var idCaja = $(this).val();
            $("#nombreCaja").text(text);
            $("#vista").show();
            $(".divProductos").show();

            var table = $('#dtProductosCobro').DataTable();
            table.destroy();
            tablaProductos(idCaja);

            $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=CobrosController&2=mostrarCombos',
                data: {idCaja:idCaja},
                success: function(r) {
                   
                        $("#combos").html(r);
                    
                }
                });

           
        }); 

        $("#carnet").keyup(function(){
           app.cargarDatos();
        });
        
        $("#codigoProducto").keyup(function(){
           app.cargarDatosCodigo();
           
        }); 

        $("#nombreProducto").keyup(function(){
           app.cargarDatosNombre();
        }); 

    });


$(document).on("click", ".btnEditar", function () {
    $('#codigoProducto').val($(this).attr("codigo"));
    $('#precioProducto').val($(this).attr("precioTabla"));
    $('#precioProductoDecimal').val($(this).attr("precioDecimal"));
    $('#nombreProducto').val($(this).attr("nombre"));
});


$(document).on("click", ".btnCombo", function () {
    var caja = $("#caja").val();
    app.cargarDatosCombo($(this).attr("nombre"),caja);
    $(".divLista").show();
    $("#totalCuenta").text("$ "+app.totalCuenta());

    
});


$('#codigoProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
      
    }
});

 

$('#nombreProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
    }
});

$('#cantidadProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
        
    }
});
$('#precioProducto').click(function(e){
    $("#precioProducto").val('$ ');
});

$('#precioProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
        
    }else{
        var valor = $(this).val();
        $("#labelPrecio").css("display","none");
        $("#precioProductoDecimal").val(valor);

        $("#precioProducto").val('$ ' +valor);
    }
});

$("#efectivo").click(function(){
    if( $('#efectivo').prop('checked') ) {
        $("#divEfectivo").show();

        $('#credito').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $('#descPlanilla').prop('checked', false);
        $("#divParcialPlanilla").hide();
        $("#descuentoPPlanilla").val('');
        $("#RemanentePPlanilla").val('');
        $("#cantidadEfectivoPPlanilla").val('');
        $("#cambioPPlanilla").val('');

    $('#descPlanilla').prop('checked', false);
    $("#divPlanilla").hide();

    $('#parcialPlanilla').prop('checked', false);
    $("#divParcialPlanilla").hide();
    $("#descuentoPPlanilla").val('');
    $("#RemanentePPlanilla").val('');
    $("#cantidadEfectivoPPlanilla").val('');
    $("#cambioPPlanilla").val('');

    }
    else{
        $('#descPlanilla').prop('checked', false);
    $("#divPlanilla").hide();

    $('#parcialPlanilla').prop('checked', false);
    $("#divParcialPlanilla").hide();
    $("#descuentoPPlanilla").val('');
    $("#RemanentePPlanilla").val('');
    $("#cantidadEfectivoPPlanilla").val('');
    $("#cambioPPlanilla").val('');

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#cantidadEfectivo").val('');
    $("#cambio").val('');
    }
});



$("#parcialPlanilla").click(function(){
    if( $('#parcialPlanilla').prop('checked') ) {
        $("#divParcialPlanilla").show();
        

        $('#credito').prop('checked', false);
        $('#efectivo').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $('#descPlanilla').prop('checked', false);
        $('#efectivo').prop('checked', false);
        $("#divEfectivo").hide();
        $("#cantidadEfectivo").val('');
        $("#cambio").val('');
        $('#descPlanilla').prop('checked', false);
        $("#divPlanilla").hide();
    }
    else{
        $('#descPlanilla').prop('checked', false);
        $("#divPlanilla").hide();

        $('#parcialPlanilla').prop('checked', false);
        $("#divParcialPlanilla").hide();
        $("#descuentoPPlanilla").val('');
        $("#RemanentePPlanilla").val('');
        $("#cantidadEfectivoPPlanilla").val('');
        $("#cambioPPlanilla").val('');

        $('#efectivo').prop('checked', false);
        $("#divEfectivo").hide();
        $("#cantidadEfectivo").val('');
        $("#cambio").val('');
    }
});

$("#descPlanilla").click(function(){
    if( $('#descPlanilla').prop('checked') ) {
        $("#divPlanilla").show();
        

        $('#credito').prop('checked', false);
        $('#efectivo').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
    $("#divParcialPlanilla").hide();
    $("#descuentoPPlanilla").val('');
    $("#RemanentePPlanilla").val('');
    $("#cantidadEfectivoPPlanilla").val('');
    $("#cambioPPlanilla").val('');

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#cantidadEfectivo").val('');
    $("#cambio").val('');
    }
    else{
    $('#descPlanilla').prop('checked', false);
    $("#divPlanilla").hide();

    $('#parcialPlanilla').prop('checked', false);
    $("#divParcialPlanilla").hide();
    $("#descuentoPPlanilla").val('');
    $("#RemanentePPlanilla").val('');
    $("#cantidadEfectivoPPlanilla").val('');
    $("#cambioPPlanilla").val('');

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#cantidadEfectivo").val('');
    $("#cambio").val('');
    }
});

$("#cantidadEfectivo").keyup(function(){
    var cuenta = app.totalCuenta();
    var efectivo = $(this).val();
    var cobro = parseFloat(efectivo)-parseFloat(cuenta);

    if(isNaN(cobro)){
        $("#cambio").val('');
    }else{
        $("#cambio").val(cobro.toFixed(2));
    }
});


$("#descuentoPPlanilla").keyup(function(){
    var cuenta = app.totalCuenta();
    var descPlanilla = $(this).val();
    var remanenteCuenta = parseFloat(cuenta)-parseFloat(descPlanilla);

    if(isNaN(remanenteCuenta)){
        $("#RemanentePPlanilla").val('');
    }else{
        $("#RemanentePPlanilla").val(remanenteCuenta.toFixed(2));
    }
});

$("#cantidadEfectivoPPlanilla").keyup(function(){
    var cuenta = $("#RemanentePPlanilla").val();
    var efectivo = $(this).val();
    var cobro = parseFloat(efectivo)-parseFloat(cuenta);

    if(isNaN(cobro)){
        $("#cambioPPlanilla").val('');
    }else{
        $("#cambioPPlanilla").val(cobro.toFixed(2));
    }
});


function limpiarTicket(){
    $("#codigoProducto").val('');
    $("#nombreProducto").val('');
    $("#precioProductoDecimal").val('');
    $("#precioProducto").val('');
    $("#cantidadProducto").val(1);

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#cantidadEfectivo").val('');
    $("#cambio").val('');
    $(".divLista").hide();
}


$("#btnCobroEfectivo").click(function(){
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivo").val();
            var cambio = $("#cambio").val();
            var usuario = $("#usuario").val();

            $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Efectivo',
                        usuario: usuario,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {

                            app.guardarCobroDetalle();      
                            limpiarTicket();       
                        }
                        
                    }
                });
});


$("#btnCobroDescuentoPPlanilla").click(function(){
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivoPPlanilla").val();
            var cambio = $("#cambioPPlanilla").val();
            var usuario = $("#usuario").val();
            var descPlanilla = $("#descuentoPPlanilla").val();

            $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Parcial en planilla',
                        usuario: usuario,
                        descPlanilla : descPlanilla,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {

                            app.guardarCobroDetalle();      
                            limpiarTicket();       
                        }
                        
                    }
                });
});

$("#btnCobroDescuentoPlanilla").click(function(){
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = "0.00";
            var cambio = "0.00";
            var usuario = $("#usuario").val();
            var descPlanilla = app.totalCuenta();

            $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Descuento en planilla',
                        usuario: usuario,
                        descPlanilla : descPlanilla,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {

                            app.guardarCobroDetalle();      
                            limpiarTicket();       
                        }
                        
                    }
                });
});


</script>