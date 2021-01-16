<div id="app">
    <div class="ui grid">
        <div class="row title-bar">
            <div class="sixteen wide column">
                        <label style="font-weight:bold;font-size: 15px;">Seleccione caja a utilizar: </label> &nbsp;
                        <select name="caja" id="caja" class="ui dropdown">
                            <option value="0" set selected>Seleccione una opción</option>
                            <?php echo $cajas; ?>
                        </select>
                        <button class="ui red button" id="btnAnularTicket" style="align:right; float:right;display:none;">Anular ticket</button>
                        
            <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION["nomUsuario"] ?>">
           <a style="color:black; font-size: 15px;color:blue;font-weight:bold;align:right; float:right;margin-right:10px;" id="nombreCaja"></a>
                        
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
               
                <form id="frmCliente" class="ui form" method="POST" method="POST" enctype="multipart/form-data"
                style="display:none;">
                
                    <div class="field">
                        <div class="fields">
                            <div class="three wide field">
                                <label> <i class="address card icon"></i> Carnet de cliente</label>
                                <input type="text" class="datosCliente" id="carnet" name="carnet" placeholder="Ingrese el carnet">
                            </div>
                        
                            <div class="three wide field divNombre"  style="display:none; font-size: 12px;">
                                    <a  id="nombreCliente" style="color:green; font-weight:bold;"></a> --
                                    <a  id="areaCliente" style="color:green; font-weight:bold;"></a><br>
                                    <a style="color:black; font-weight:bold;">Subsidio de área: </a>
                                    <a style="color:green; font-weight:bold;" id="subsArea"></a>
                                    <a style="color:black; font-weight:bold;">Remanente de subsidio: </a>
                                    <a style="color:green; font-weight:bold;" id="subsRemanente"></a>
                            </div> 

                            <div class="three wide field">
                                <label> <i class="barcode icon"></i> Código Producto</label>
                                <input type="text" id="codigoProducto" name="codigoProducto" class="datosCliente">
                            </div>

                            <div class="three wide field">
                                <label> <i class="pencil icon"></i> Nombre Producto</label>
                                <input type="text" id="nombreProducto" name="nombreProducto" class="datosCliente">
                            </div>

                            <div class="three wide field">
                                <label> <i class="dollar sign icon"></i> Precio Producto</label>
                                <input type="text" id="precioProducto" name="precioProducto" class="datosCliente">
                                <input type="hidden" id="precioProductoDecimal" name="precioProductoDecimal">
                                <div class="ui red pointing label"  id="labelPrecio"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Asigna un precio</div>
                                
                            </div>

                            <div class="three wide field">
                                <label> <i class="plus icon"></i> Cantidad</label>
                                <input type="number" id="cantidadProducto" name="cantidadProducto" value="1" class="datosCliente">
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

                        <a style="font-weight: bold; font-size: 18px; color: black;" class="totalCuenta"></a>

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
                                            <input class="requerido" v-model="lista.cantidadProductoL" name="cantidadProductoL"
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


                    </div>
                </div>
            </div>

        </div>
</div>
</div>


<div class="ui modal" id="modalAnulaTicket">

    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="close icon"></i> Anular Ticket
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
       <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                        <label>N° de Ticket: </label>
                        <input type="text" name="nTicket" id="nTicket" placeholder="N° de Ticket">
                    </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div id="divTicket" style="display:none;">
                        <h3 style="color:blue;">Detalle del ticket</h3>
                        <div class="field">
                            <div class="fields">
                                <div class="three wide field">
                                    <label style="text-align:right;color:#038203;">Cliente:</label>
                                </div>
                                <div class="seven wide field">
                                    <label style="text-align:left;" id="clienteTkc"></label>
                                </div>
                                <div class="two wide field">
                                    <label style="text-align:right;color:#038203;">Carnet:</label>
                                </div>
                                <div class="four wide field">
                                    <label style="text-align:left;" id="carnetTkc"></label>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="fields">
                                <div class="sixteen wide field" id="detTicket">
                                
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="fields">
                                <div class="three wide field">
                                    <label style="text-align:right;color:#038203;">T.Pago:</label>
                                </div>
                                <div class="four wide field">
                                    <label style="text-align:left;" id="tipoPagoTkc"></label>
                                </div>
                                <div class="four wide field">
                                    <label style="text-align:right;color:#038203;">Usuario Cobro:</label>
                                </div>
                                <div class="two wide field">
                                    <label style="text-align:left;" id="usuarioTkc"></label>
                                </div>
                                <div class="four wide field">
                                    <label style="text-align:right;color:#038203;">Fecha Emisión:</label>
                                    <label style="text-align:right;color:#038203;">Hora Emisión:</label>
                                </div>
                                <div class="four wide field">
                                    <label style="text-align:left;" id="fechaETkc"></label>
                                    <label style="text-align:left;" id="horaETkc"></label>
                                </div>
                            </div>
                        </div>


                        <div class="field">
                            <div class="fields">
                                <div class="three wide field">
                                    <label style="text-align:right;color:#038203;">Descuento planilla:</label>
                                    <label style="text-align:right;color:#038203;">Descuento subsidio:</label>
                                    <label style="text-align:right;color:#038203;">Efectivo Recibido:</label>
                                </div>
                                <div class="two wide field">
                                    <label style="text-align:left;" id="descPlanillaTkc"></label>
                                    <label style="text-align:left;" id="descSubsidioTkc"></label>
                                    <label style="text-align:left;" id="efectivoTkc"></label>
                                </div>
                                <div class="four wide field">
                                    <br><br>
                                    <label style="text-align:right;color:#038203;">Cambio:</label>
                                </div>
                                <div class="two wide field">
                                <br><br>
                                    <label style="text-align:left;" id="cambioTkc"></label>
                                </div>

                                <div class="three wide field">
                                <br><br>
                                    <label style="text-align:right;color:#038203;">Total:</label>
                                </div>
                                <div class="two wide field">
                                <br><br>
                                    <label style="text-align:left;" id="totalTkc"></label>
                                </div>
                            </div>
                        </div>
            </div>
       </form>
    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cerrar
            </button>
            <button class="ui teal button" id="btnGuardarAnular" >
                Anular
            </button>
    </div>
</div>

<div class="ui tiny modal" id="modalTipoCobro" style="position: absolute;top: 10px;">
<div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>
    <input type="hidden" id="validarRemanente">
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
    <div class="divLista" style="text-align:left;display:none; width: 100%;">
                        <a style="font-weight: bold; font-size: 16px; color: #010187;margin-left:20px;">Tipo de pago:</a>
                        <br><br>

                        <input type="checkbox" id="efectivo" name="efectivo" value="Efectivo">
                        <label style="font-weight:bold;color:#981700;"> Efectivo</label><br>
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
                            

                        <input type="checkbox" id="credito" name="credito" value="Crédito" style="float:left">
                        <label style="font-weight:bold;color:#981700;"> Subsidio</label><br>
                        <div id="divCredito" style="display:none;">
                                    
                            <a class="ui green button" id="btnCobroSubsidio">Cobrar</a><br><br>
                        </div>

                        <input type="checkbox" id="parcialPlanilla" name="parcialPlanilla" value="Parcial Planilla" style="float:left">
                        <label style="font-weight:bold;color:#981700;">Parcial en planilla</label><br>
                            <div id="divParcialPlanilla" style="display:none;">
                                    <form class="ui form">
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Descuento planilla: </label>
                                                <input type="text" name="descuentoPPlanilla" id="descuentoPPlanilla" 
                                                placeholder="Descuento planilla">
                                            </div>
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Remanente cuenta actual: </label>
                                                <input type="text" name="RemanentePPlanilla" id="RemanentePPlanilla" 
                                                placeholder="Remanente cuenta" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Efectivo: </label>
                                                <input type="text" name="cantidadEfectivoPPlanilla" id="cantidadEfectivoPPlanilla" 
                                                placeholder="Efectivo recibido">
                                            </div>

                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Cambio: </label>
                                                <input type="text" name="cambioPPlanilla" id="cambioPPlanilla" 
                                                placeholder="Cambio" readonly>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    </form>

                                    
                                    <a class="ui green button" id="btnCobroDescuentoPPlanilla">Cobrar</a>
                                    <br><br>
                            </div>

                        <input type="checkbox" id="parcialSubsidio" name="parcialSubsidio" value="Parcial Subsidio" style="float:left">
                        <label style="font-weight:bold;color:#981700;">Parcial con subsidio</label><br>
                        <div id="divParcialSubs" style="display:none;">
                                    <form class="ui form">
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Descuento Subsidio: </label>
                                                <input type="text" name="descuentoPSubs" id="descuentoPSubs" 
                                                placeholder="Subsidio">
                                            </div>
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Remanente cuenta actual: </label>
                                                <input type="text" name="RemanentePSubs" id="RemanentePSubs" 
                                                placeholder="Remanente cuenta" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="fields">
                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Efectivo: </label>
                                                <input type="text" name="cantidadEfectivoPSubs" id="cantidadEfectivoPSubs" 
                                                placeholder="Efectivo recibido">
                                            </div>

                                            <div class="eight wide field">
                                                <label style="font-size:12px;">Cambio: </label>
                                                <input type="text" name="cambioPSubs" id="cambioPSubs" 
                                                placeholder="Cambio" readonly>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    </form>

                                    
                                    <a class="ui green button" id="btnCobroDescuentoPSubs">Cobrar</a>
                                    <br><br>
                            </div>

                        <input type="checkbox" id="descPlanilla" name="descPlanilla" value="descPlanilla" style="float:left">
                        <label style="font-weight:bold;color:#981700;">Descuento en planilla</label>

                        <div id="divPlanilla" style="display:none;">
                                    
                                    <a class="ui green button" id="btnCobroDescuentoPlanilla">Cobrar</a>
                            </div>


                    </div>

    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cerrar
            </button>
    </div>
</div>

<script src="./res/tablas/tablaProductosCobro.js"></script>

<script>

$(document).ready(function(){
    var elements = document.getElementsByClassName("datosCliente");
    var currentIndex = 0;
    var elements1 = document.getElementsByClassName("chPago");
    var currentIndex1 = 0;

    document.onkeydown = function(e) {
      switch (e.keyCode) {
        case 37:
          currentIndex = (currentIndex == 0) ? elements.length - 1 : --currentIndex;
          elements[currentIndex].focus();

          
        
          
          break;
        case 39:
          currentIndex = ((currentIndex + 1) == elements.length) ? 0 : ++currentIndex;
          elements[currentIndex].focus();

          break;
        case 38:
          currentIndex1 = (currentIndex1 == 0) ? elements1.length - 1 : --currentIndex1;
          elements1[currentIndex1].focus();

         
          break;
        case 40:
          currentIndex1 = ((currentIndex1 + 1) == elements1.length) ? 0 : ++currentIndex1;
          elements1[currentIndex1].focus();
          break;

          case 27:
          $("#modalTipoCobro").modal('hide');
          $("#cantidadProducto").val('1');
          $("#codigoProducto").val('');
          $("#nombreProducto").val('');
          $("#precioProducto").val('');
          $("#precioProductoDecimal").val('');
          break;
      }
    };

    
});



$(document).on("keypress", function (e) {
    if(e.keyCode == '42'){
        $("#efectivo").focus();
        $('#modalTipoCobro').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }
});





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

               $('#precioProducto').keypress(function(e) {
                 if (e.keyCode == '13') {
                    e.preventDefault();
                    //your code here
                  }
               })

               $('#nTicket').keypress(function(e) {
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
                $(".totalCuenta").text("$ "+this.totalCuenta());
            },
            agregarDetalleLista() {
                this.listas.push({
                    codigoProductoL: $("#codigoProducto").val(),
                    nombreProductoL: $("#nombreProducto").val(),
                    precioProductoL : $("#precioProducto").val(),
                    precioProductoDecimalL: $("#precioProductoDecimal").val(),
                    cantidadProductoL : $("#cantidadProducto").val(),
                });
                    $("#cantidadProducto").val('1');
                    $("#codigoProducto").val('');
                    $("#nombreProducto").val('');
                    $("#precioProducto").val('');
                    $("#precioProductoDecimal").val('');
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

                        if(id == '11' || id == '22'){
                            $('#nombreCliente').text(dat.nombre);
                        $('#areaCliente').text(dat.area);
                        $('#sucursalCliente').text(dat.sucursal);
                        $('#subsArea').text("$ 0.00");
                        $("#subsRemanente").text("$ 0.00");
                        $(".divNombre").show();
                        }else{
                            $('#nombreCliente').text(dat.nombre);
                        $('#areaCliente').text(dat.area);
                        $('#sucursalCliente').text(dat.sucursal);
                        $('#subsArea').text("$ 1.50 diario");
                        $("#subsRemanente").text("$ "+dat.subsidioremanente);
                        $("#validarRemanente").val(dat.subsidioremanente);
                        $(".divNombre").show();
                        }
                       
                      
                        

                        if(dat.subsidioArea == '$ 0.00'){     
                            $("#credito").css("display","none");
                            $("#parcialSubsidio").css("display","none");
                        }else{
                            $("#credito").css("display","block");
                            $("#parcialSubsidio").css("display","block");
                        }
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
                    
                $(".totalCuenta").text("$ "+app.totalCuenta());
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

                                app.limpiar();     
                                $('#modalTipoCobro').modal('hide');        
                            }
                            
                        }
                    });
                }

            },

            anularTicket() {
                var id = $("#nTicket").val();
                var caja = $("#caja").val();

            fetch("?1=CobrosController&2=anularTicket&id="+id+"&caja="+caja)
            .then(response => {
                return response.json();
            })
            .then(dat => {

                dat.forEach(element => {
                    $("#clienteTkc").text(element["cliente"]);
                    $("#carnetTkc").text(element["carnet"]);
                    $("#tipoPagoTkc").text(element["tipoPago"]);
                    $("#usuarioTkc").text(element["usuarioCobro"]);
                    $("#efectivoTkc").text(element["efectivoRecibidoTck"]);
                    $("#cambioTkc").text(element["cambioTkc"]);
                    $("#totalTkc").text(element["totalTkc"]);
                    $("#fechaETkc").text(element["fechaE"]);
                    $("#horaETkc").text(element["horaE"]);
                    $("#descPlanillaTkc").text(element["descPlanilla"]);
                    $("#descSubsidioTkc").text(element["descSubsidio"]);
            });
                    
                })
                .catch(err => {
                });
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


$("#cantidadProductoL").keypress(function(){
    app.totalCuenta();
});

$('#btnAnularTicket').click(function() {
    $("#divTicket").hide();
    $("#nTicket").val('');
$('#modalAnulaTicket').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

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

        $("#descuentoPSubs").mask("###0.00", {reverse: true});
        $("#RemanentePSubs").mask("###0.00", {reverse: true});
        $("#cantidadEfectivoPSubs").mask("###0.00", {reverse: true});
        $("#cambioPSubs").mask("###0.00", {reverse: true});

        $("#caja").change(function(){
            app.listas = [];
            limpiar();
            $("#btnAnularTicket").show();
            $("#frmCliente").show();
            $(".totalCuenta").text("$ 0.00");
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

        $("#carnet").keyup(function(e){
            if(e.keyCode == '13'){
                e.preventDefault();
                $("#codigoProducto").focus();
                app.cargarDatos();

                limpiarTicket();   
                app.limpiar();
            }else{
         
            }
        
          
        });
        
        $("#codigoProducto").keyup(function(e){
            if(e.keyCode == '39'){
            }else if(e.keyCode == '37'){
            }else{
                app.cargarDatosCodigo();
            }
           
           
        }); 

        $("#nombreProducto").keyup(function(e){
            if(e.keyCode == '39'){
            }else if(e.keyCode == '37'){
            }else{
                app.cargarDatosCodigo();
            }
        }); 

    });


$(document).on("click", ".btnEditar", function () {
    $('#codigoProducto').val($(this).attr("codigo"));
    $('#precioProducto').val($(this).attr("precioTabla"));
    $('#precioProductoDecimal').val($(this).attr("precioDecimal"));
    $('#nombreProducto').val($(this).attr("nombre"));
    
    if($(this).attr("codigo") == '//'){
        $('#precioProducto').prop("readonly",false);
    }else{
        $('#precioProducto').prop("readonly",true);
    }
    $("#cantidadProducto").val(1);
});


$(document).on("click", ".btnCombo", function () {
    var caja = $("#caja").val();
    app.cargarDatosCombo($(this).attr("nombre"),caja);
    $(".divLista").show();
    $(".totalCuenta").text("$ "+app.totalCuenta());

    
});


$('#codigoProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $(".totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();

        if($("#subsArea").text()=="$ 0.00" || $("#subsRemanente").text()=="$ 0.00"){
            $("#credito").prop("disabled",true);
            $("#parcialSubsidio").prop("disabled",true);
        }else{
            $("#credito").prop("disabled",false);
            $("#parcialSubsidio").prop("disabled",false);
        }
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
        $(".totalCuenta").text("$ "+app.totalCuenta());
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
        $(".totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
        
    }
});
$('#precioProducto').focus(function(e){
    if($('#codigoProducto').val()== '//'){
        $('#precioProducto').prop("readonly",false);
        $("#precioProducto").val('');
    }else{
        $('#precioProducto').prop("readonly",true);

    }
   
});

$('#precioProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else{
        $(".divLista").show();
        app.agregarDetalleLista();
        $(".totalCuenta").text("$ "+app.totalCuenta());
        //limpiar();
        e.preventDefault();
        }
        
    }else{
        var valor = $(this).val();
        $("#labelPrecio").css("display","none");
        $("#precioProductoDecimal").val(valor);

        $("#precioProducto").val(valor);
    }
});

$("#efectivo").click(function(){


    if( $('#efectivo').prop('checked') ) {
     
        $("#divEfectivo").show();

        $('#credito').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $("#divParcialSubs").hide();
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
        $("#divCredito").hide();
        $("#descuentoPSubs").val('');
        $("#RemanentePSubs").val('');
        $("#cantidadEfectivoPSubs").val('');
        $("#cambioPSubs").val('');
        }
        else{
            $('#descPlanilla').prop('checked', false);
        $("#divPlanilla").hide();

        $('#parcialPlanilla').prop('checked', false);
        $("#divParcialPlanilla").hide();
        $('#parcialSubsidio').prop('checked', false);
        $("#divParcialSubs").hide();
        $("#descuentoPPlanilla").val('');
        $("#RemanentePPlanilla").val('');
        $("#cantidadEfectivoPPlanilla").val('');
        $("#cambioPPlanilla").val('');

        $('#efectivo').prop('checked', false);
        $("#divEfectivo").hide();
        $("#cantidadEfectivo").val('');
        $("#cambio").val('');
        $("#descuentoPSubs").val('');
        $("#RemanentePSubs").val('');
        $("#cantidadEfectivoPSubs").val('');
        $("#cambioPSubs").val('');
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
        $("#divCredito").hide();
        $('#parcialSubsidio').prop('checked', false);
    $("#divParcialSubs").hide();
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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
        $('#parcialSubsidio').prop('checked', false);
         $("#divParcialSubs").hide();
         $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
    }
});

$("#descPlanilla").click(function(){
    if( $('#descPlanilla').prop('checked') ) {
        $("#divPlanilla").show();
        

        $('#credito').prop('checked', false);
        $('#efectivo').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
    $("#divParcialPlanilla").hide();
    $("#descuentoPPlanilla").val('');
    $("#RemanentePPlanilla").val('');
    $("#cantidadEfectivoPPlanilla").val('');
    $("#cambioPPlanilla").val('');
    $('#parcialSubsidio').prop('checked', false);
    $("#divParcialSubs").hide();

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#cantidadEfectivo").val('');
    $("#cambio").val('');
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
    }
});


$("#credito").click(function(){
    if( $('#credito').prop('checked') ) {
        $("#divCredito").show();

     
        $('#parcialPlanilla').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
    $("#divParcialSubs").hide();
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

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();


    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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
    $("#divCredito").hide();

    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
    }
});


$("#parcialSubsidio").click(function(){
    if( $('#parcialSubsidio').prop('checked') ) {
        $("#divParcialSubs").show();

     
        $('#parcialPlanilla').prop('checked', false);
        $('#credito').prop('checked', false);
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

    $('#efectivo').prop('checked', false);
    $("#divEfectivo").hide();
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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
    $("#divCredito").hide();
    $('#parcialSubsidio').prop('checked', false);
    $("#divParcialSubs").hide();
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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


$("#descuentoPSubs").keyup(function(){
    var cuenta = app.totalCuenta();
    var descPlanilla = $(this).val();
    var remanenteCuenta = parseFloat(cuenta)-parseFloat(descPlanilla);

    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
    if(isNaN(remanenteCuenta)){
        $("#RemanentePSubs").val('');
    }else{
        $("#RemanentePSubs").val(remanenteCuenta.toFixed(2));
    }
});

$("#cantidadEfectivoPSubs").keyup(function(){
    var cuenta = $("#RemanentePSubs").val();
    var efectivo = $(this).val();
    var cobro = parseFloat(efectivo)-parseFloat(cuenta);

    if(isNaN(cobro)){
        $("#cambioPSubs").val('');
    }else{
        $("#cambioPSubs").val(cobro.toFixed(2));
    }
});

function imprimirTicket(carnet){

                                swal({
                                    title: 'Cobro Registrado',
                                    text: 'Se imprimirá el ticket',
                                    type: 'success',
                                    showConfirmButton: true,
                                        timer: 1500
                                }).then((result) => {
                                     $.ajax({
                                        type: 'POST',
                                        url: './app/Controllers/impresionTermica/ticketNormal.php?carnet='+carnet,
                                    });    

                                    $("#carnet").val('');
                                    $(".divNombre").hide(); 
                                }); 
          
}

function imprimir2Tickets(carnet){
    swal({
                                    title: 'Cobro Registrado',
                                    text: 'Se imprimirá el ticket',
                                    type: 'success',
                                    showConfirmButton: false,
                                        timer: 1500
                                }).then((result) => {
                                     $.ajax({
                                        type: 'POST',
                                        url: './app/Controllers/impresionTermica/ticketNormal.php?carnet='+carnet,
                                    });    

                                $.ajax({
                                        type: 'POST',
                                        url: './app/Controllers/impresionTermica/ticketNormal.php?carnet='+carnet,
                                    });  
                                    $("#carnet").val('');
                                    $(".divNombre").hide(); 
                                }); 
}
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

    
    $('#credito').prop('checked', false);
        $('#parcialPlanilla').prop('checked', false);
        $('#parcialSubsidio').prop('checked', false);
        $("#divParcialSubs").hide();
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
    $("#divCredito").hide();
    $("#descuentoPSubs").val('');
    $("#RemanentePSubs").val('');
    $("#cantidadEfectivoPSubs").val('');
    $("#cambioPSubs").val('');
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
                               
                        }
                    }
                }).then(function(){
                    imprimirTicket(carnet);
                    limpiarTicket(); 
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
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                    limpiarTicket(); 
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
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                    limpiarTicket(); 
                });
});

$("#nTicket").keyup(function(e){
    if(e.keyCode == 13)
    {
        var id = $("#nTicket").val();
        var caja = $("#caja").val();

       app.anularTicket();
       $("#divTicket").show();

       $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=CobrosController&2=detalleTicket',
                data: {
                    id:id,
                    caja:caja
                },
                success: function(r) {
                   
                        $("#detTicket").html(r);
                    
                }
        });
    }else{
       
    }
});


$("#btnGuardarAnular").click(function(){
            var id = $("#nTicket").val();

            $.ajax({
                    type: 'POST',
                    data: {
                        id: id,
                    },
                    url: '?1=CobrosController&2=anularEstadoTicket',
                    success: function (r) {
                        if (r == 1) {  
                            swal({
                            title: 'Ticket anulado',
                            text: 'Guardado con éxito',
                            type: 'warning',
                            showConfirmButton: false,
                                timer: 1700
                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        });   
                            $("#divTicket").hide();
                            $("#nTicket").val('');
                            $('#modalAnulaTicket').modal('hide');
                        }
                        
                    }
                });
});





$("#btnCobroSubsidio").click(function(){

    var remanente = $("#validarRemanente").val();


            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = "0.00";
            var cambio = "0.00";
            var usuario = $("#usuario").val();
            var descSubsidio = app.totalCuenta();

            if(descSubsidio > remanente){
                swal({
                    title: 'Denegado',
                    text: 'El monto excede el monto disponible para subisidio',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                    });
            }else{
                $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Subsidio',
                        usuario: usuario,
                        descSubsidio : descSubsidio,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();  
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                    limpiarTicket(); 
                });
            }

            
                
});


$("#btnCobroDescuentoPSubs").click(function(){
    var remanente = $("#validarRemanente").val();
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivoPSubs").val();
            var cambio = $("#cambioPSubs").val();
            var usuario = $("#usuario").val();
            var descSubsidio = $("#descuentoPSubs").val();


            if(descSubsidio > remanente){
                swal({
                    title: 'Denegado',
                    text: 'El monto excede el monto disponible para subisidio',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                    });
            }else{
                $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Parcial en subsidio',
                        usuario: usuario,
                        descSubsidio : descSubsidio,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                    limpiarTicket(); 
                });

            }

            
});

</script>