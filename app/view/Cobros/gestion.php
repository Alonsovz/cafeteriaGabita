<div id="app">
    <div class="ui grid">
        <div class="row title-bar">
            <div class="sixteen wide column">
            <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                    <label>Seleccione caja a utilizar: </label>
                        <select name="caja" id="caja" class="ui dropdown">
                            <option value="0" set selected>Seleccione una opción</option>
                            <?php echo $cajas; ?>
                        </select>
                    </div>
                    <input type="hidden" id="validarModal">

                    <div class="four wide field">
                        <label>Fecha de facturacion</label>
                        <input type="date" id="fechaFacturacion" name="fechaFacturacion">
                    </div>
                    <div class="two wide field"></div>
                    <div class="six wide field">
                    <br>
                    <button class="ui green button" id="btnTodoTickets" style="align:right; float:right;display:none;">Anular tickets</button>
                     
                    <button class="ui red button" id="btnAnularTicket" style="align:right; float:right;display:none;">Anular ticket por N°</button>
                        
                        <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION["nomUsuario"] ?>">
                    </div>

                </div>
            </div>
                        
           
            
            
          
            </form>
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
    <input type="hidden" id="validarRemanente">
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
       <button id="btnImprimirTicket" class="ui green button">Imprimir ticket</button>
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



<div class="ui modal" id="modalAnulaTickets">

    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="close icon"></i> Anular Tickets
    </div>
    <div class="scrolling content" class="ui equal width form" style="background-color:#E0E0E0;">
       <form class="ui form"> 
            <div class="field">
                <div class="fields">
                    <div class="seven wide field">
                        <label>Fecha de emisión: </label>
                        <input type="date" id="fechaTickets">
                    </div>
                    <div class="seven wide field">
                        <br>
                        <a class="ui blue button" id="btnProcesarTickets">Ver tickets</a>
                    </div>
                </div>
            </div>
       </form>

       <div class="sixteen wide field">
            <table class="ui table" id="dtTickets" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="background-color: black; color:white;">N° Ticket</th>
                        <th style="background-color: black; color:white;">Carnet</th>
                        <th style="background-color: black; color:white;">Cliente</th>
                        <th style="background-color: black; color:white;">Tipo Pago</th>
                        <th style="background-color: black; color:white;">Efectivo</th>
                        <th style="background-color: black; color:white;">Planilla</th>
                        <th style="background-color: black; color:white;">Subsidio</th>
                        <th style="background-color: black; color:white;">Total</th>
                        <th style="background-color: black; color:white;"><i class="trash icon"></i></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
    <div class="actions">
            <button class="ui black deny button">
                Cerrar
            </button>
    </div>
</div>

<div class="ui tiny modal" id="modalCobroEfectivo" style="position: absolute;top: 10px;">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar en efectivo
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>

    <div class="content">

    <form class="ui form" id="frmEfectivo" style="margin-left: 25% !important;">
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
    <br><br>
        <b style="text-align:center !important;">"Esc" para cancelar</b>
    </div>
</div>


<div class="ui tiny modal" id="modalCobroSubsidio" style="position: absolute;top: 10px;">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar en subsidio
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>

    <div class="content" style="text-align:center !important;">
        <h2>¿Desea efectuar cobro en subsidio?</h2>
        
        <b>"Enter" para aceptar</b>
        <br><br>
        <button class="ui green deny button" id="aceptarSubsidio">
                Si
        </button>
        <br><br>
        <b>"Esc" para cancelar</b>

    </div>

</div>


<div class="ui tiny modal" id="modalCobroPlanilla" style="position: absolute;top: 10px;">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar en planilla
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>

    <div class="content" style="text-align:center !important;">
        <h2>¿Desea efectuar cobro en planilla?</h2>
        
        <b>"Enter" para aceptar</b>
        <br><br>
        <button class="ui green deny button" id="aceptarPlanilla">
                Si
        </button>
        <br><br>
        <b>"Esc" para cancelar</b>

    </div>

</div>


<div class="ui tiny modal" id="modalCobroParcialPlanilla" style="position: absolute;top: 10px;">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar parcial planilla
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>

    <div class="content" style="text-align:center !important;">
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
    <br><br>
        <b style="text-align:center !important;">"Esc" para cancelar</b>
    </div>

</div>



<div class="ui tiny modal" id="modalCobroParcialSubsidio" style="position: absolute;top: 10px;">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Cobrar parcial subsidio
    
    <a style="font-weight: bold; font-size: 16px; color: yellow;margin-left:30px;">Total:</a>
    <a style="font-weight: bold; font-size: 18px; color: white;" class="totalCuenta"></a>
    </div>

    <div class="content" style="text-align:center !important;">
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
                    <input type="checkbox" id="cargarEnPlanilla" class="chPago"> Cargar en planilla
                </div>
            </div>
        </div>
        <div class="field">
            <div class="fields">
                <div class="eight wide field">
                <input type="checkbox" id="cargarEnEfectivo" class="chPago"> Cargar en efectivo
                </div>
            </div>
        </div>
        <div class="field" id="remanenteConEfectivo" style="display:none;">
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
    <br><br>
        <b style="text-align:center !important;">"Esc" para cancelar</b>
    </div>

</div>


<div class="ui tiny modal" id="modalConfirmAnula">
    <div class="header" style="background-color:#024D54; color:white;">
    <i class="ticket icon"></i><i class="dollar sign icon"></i> Anular ticket
    
    </div>

    <div class="content" style="text-align:center !important;">
    <input type="hidden" id ="idAnular">
    <h2 style="color:red;">¿Desea anular el ticket N° <a style="color:red;" id="idTicketAnular"></a>?</h2>
    </div>

    <div class="actions">
            <button class="ui black deny button" id="btnCancelarAnular">
                No
            </button>

            <button class="ui green button" id="btnConfirmarAnular">
                Si
            </button>
    </div>
</div>


<div class="ui tiny modal" id="modalConfirmarTicketEfectivo">
    

    <div class="content" style="text-align:center !important;">
        <h2 style="color:red;">¿Desea imprimir ticket?</h2>
        <form class="ui form">
        
        <div class="field">
            <div class="fields">
                <div class="eight wide field">
                    <input type="checkbox" id="siTckEfectivo" class="tckEfectivo"> Si
                </div>
                <div class="eight wide field">
                    <input type="checkbox" id="noTckEfectivo" class="tckEfectivo"> No
                </div>
            </div>
        </div>

        </form>
    </div>

    
</div>


<div class="ui tiny modal" id="modalConfirmarDoble">
    

    <div class="content" style="text-align:center !important;">
        <h2 style="color:red;">¿Desea imprimir ticket?</h2>
        <form class="ui form">
        
        <div class="field">
            <div class="fields">
                <div class="eight wide field">
                    <input type="checkbox" id="siTckDoble" class="tckDoble"> Si
                </div>
                <div class="eight wide field">
                    <input type="checkbox" id="noTckDoble" class="tckDoble"> No
                </div>
            </div>
        </div>

        </form>
    </div>

    
</div>

<script src="./res/tablas/tablaProductosCobro.js"></script>
<script src="./res/tablas/tablaTickets.js"></script>
<script>

$(document).ready(function(e){

        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        $('#fechaFacturacion').val(today);
        $('#fechaTickets').val(today);
   
    var elements = document.getElementsByClassName("datosCliente");
    var currentIndex = 0;
    var elements1 = document.getElementsByClassName("chPago");
    var currentIndex1 = 0;

    var elements2 = document.getElementsByClassName("tckEfectivo");
    var currentIndex2 = 0;

    var elements3 = document.getElementsByClassName("tckDoble");
    var currentIndex3 = 0;

            document.onkeydown = function(e) {
      switch (e.keyCode) {

        
        //flecha izquierda
        case 37:
            if($("#validarModal").val() == '1'){
                currentIndex2 = (currentIndex2 == 0) ? elements2.length - 1 : --currentIndex2;
                elements2[currentIndex2].focus();
            }
            else if($("#validarModal").val() == '2'){
                currentIndex3 = (currentIndex3 == 0) ? elements3.length - 1 : --currentIndex3;
                elements3[currentIndex3].focus();
            }
            else{
                currentIndex = (currentIndex == 0) ? elements.length - 1 : --currentIndex;
                elements[currentIndex].focus();
            }
         
          break;
          //flecha derecha
        case 39:
            if($("#validarModal").val() == '1'){
                currentIndex2 = ((currentIndex2 + 1) == elements2.length) ? 0 : ++currentIndex2;
                elements2[currentIndex2].focus();
            }
            else if($("#validarModal").val() == '1'){
                currentIndex3 = ((currentIndex3 + 1) == elements2.length) ? 0 : ++currentIndex3;
                elements2[currentIndex3].focus();
            }
            else{
                currentIndex = ((currentIndex + 1) == elements3.length) ? 0 : ++currentIndex;
                elements3[currentIndex].focus();
         
            }
          
            break;
         
          //flecha arriba
        case 38:
            currentIndex1 = ((currentIndex1 + 1) == elements1.length) ? 0 : ++currentIndex1;
          elements1[currentIndex1].focus();
        break;
       
        //flecha abajo
        case 40:
            currentIndex1 = ((currentIndex1 + 1) == elements1.length) ? 0 : ++currentIndex1;
          elements1[currentIndex1].focus();
        break;

          case 27:
          $("#modalCobroEfectivo").modal('hide');
          $("#modalCobroSubsidio").modal('hide');
          $('#modalCobroParcialSubsidio').modal('hide');
          $("#modalCobroPlanilla").modal('hide');
          $("#modalCobroParcialPlanilla").modal('hide'); 
          $("#cantidadProducto").val('1');
          $("#codigoProducto").val('');
          $("#nombreProducto").val('');
          $("#precioProducto").val('');
          $("#precioProductoDecimal").val('');
          $("#codigoProducto").focus();
          break;
          //modal para cobro en efectivo
          case 112:
            e.preventDefault();
            
            $("#validarModal").val('1');
            $('#modalCobroEfectivo').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $("#cantidadEfectivo").focus();
          break;

          //modal para cobro full subsidio
          case 113:
            e.preventDefault();
            
            $("#validarModal").val('2');
            $('#modalCobroSubsidio').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $("#aceptarSubsidio").focus();
          break;
          //modal para cobro subsidio parcial
          case 114:
            e.preventDefault();
            
            $("#validarModal").val('2');
            $('#modalCobroParcialSubsidio').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $("#descuentoPSubs").focus();
          break;

          //modal para planilla
          case 115:
            e.preventDefault();
            
            $("#validarModal").val('2');
            $('#modalCobroPlanilla').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $("#aceptarPlanilla").focus();
          break;

          //modal para planilla parcial
          case 116:
            e.preventDefault();
            
            $("#validarModal").val('2');
            $('#modalCobroParcialPlanilla').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $("#descuentoPPlanilla").focus();
          break;
      }
    };

    
    
});


$("#cerrarModalCobro").click(function(){
    //$("#modalTipoCobro").modal('hide');
          $("#cantidadProducto").val('1');
          $("#codigoProducto").val('');
          $("#nombreProducto").val('');
          $("#precioProducto").val('');
          $("#precioProductoDecimal").val('');
});


$(document).on("keypress", function (e) {
    if(e.keyCode == '42'){
        if($('#subsArea').text()=="$ 1.50 diario"){   
            $("#credito").css("display","block");
            $("#parcialSubsidio").css("display","block");
        }else{
            $("#credito").css("display","none");
            $("#parcialSubsidio").css("display","none");
        }

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
                if(this.listas.length > 0){
                    let acum = 0
                var totalCantidad = 0;
                var total = 0;
                let result =  this.listas.filter((item,index)=>{

                    if(item.codigoProductoL === $("#codigoProducto").val()){
                        totalCantidad = this.listas[index].cantidadProductoL;

                        total = parseFloat(totalCantidad) + parseFloat($("#cantidadProducto").val());
                        
                        this.listas[index].cantidadProductoL = total;

                    return this.listas.indexOf(item) === index;
                    }
                
                });
                if(result.length > 0){
                    }else{
                        this.listas.push({
                        codigoProductoL: $("#codigoProducto").val(),
                        nombreProductoL: $("#nombreProducto").val(),
                        precioProductoL : $("#precioProducto").val(),
                        precioProductoDecimalL: $("#precioProductoDecimal").val(),
                        cantidadProductoL : $("#cantidadProducto").val(),
                    });
                }
                }else{
                    this.listas.push({
                        codigoProductoL: $("#codigoProducto").val(),
                        nombreProductoL: $("#nombreProducto").val(),
                        precioProductoL : $("#precioProducto").val(),
                        precioProductoDecimalL: $("#precioProductoDecimal").val(),
                        cantidadProductoL : $("#cantidadProducto").val(),
                    });
                }
                    $("#cantidadProducto").val('1');
                    $("#codigoProducto").val('');
                    $("#nombreProducto").val('');
                    $("#precioProducto").val('');
                    $("#precioProductoDecimal").val('');
                    $("#codigoProducto").focus();
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
                var fecha = $("#fechaFacturacion").val();
                fetch("?1=CobrosController&2=getDatosCliente&carnet=" + id+"&fecha="+fecha)
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

                                  
                                $('#modalCobroEfectivo').modal('hide');
                                $('#modalCobroSubsidio').modal('hide');    
                                $("#modalCobroPlanilla").modal('hide'); 
                                $("#modalCobroParcialPlanilla").modal('hide'); 
                                $('#modalCobroParcialSubsidio').modal('hide');
                                $("#remanenteConEfectivo").css("display","none");
                                $("#cargarEnPlanilla").prop("checked",false);
                                $("#cargarEnEfectivo").prop("checked",false);
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



$('#btnAnularTicket').click(function(e) {
    e.preventDefault();
    $("#divTicket").hide();
    $("#nTicket").val('');
$('#modalAnulaTicket').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnTodoTickets").click(function(e) {
e.preventDefault();



$('#modalAnulaTickets').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnProcesarTickets").click(function() {
 
    var idCaja = $("#caja").val();
    var fecha = $("#fechaTickets").val();

    var table = $('#dtTickets').DataTable();
    table.destroy();
    mostrarTickets(idCaja,fecha);

       
});

    $(document).ready(function(){
        $('#carnet').mask("99999999-9");
        app.eliminarDetalleLista(0);
        var total = 0;

       

        $("#caja").change(function(){
            
            app.listas = [];
            limpiar();
            $("#btnAnularTicket").show();
            $("#btnTodoTickets").show();
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
                $("#carnet").focus();
           
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


$(document).on("click", ".btnAnularTicketLista", function () {
    $('#idAnular').val($(this).attr("id"));
    $("#idTicketAnular").text($(this).attr("id"));
    $('#modalConfirmAnula').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnCancelarAnular").click(function(){
    $('#modalAnulaTickets').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnConfirmarAnular").click(function(){

    var id = $("#idAnular").val();

    $.ajax({
        type: 'POST',
        data: {
            id: id,
        },
        url: '?1=CobrosController&2=anularTicketLista',
        success: function (r) {
            if (r == 1) {
                //$('#modalConfirmAnula').modal('hide');
                swal({
                    title: 'Ticket anulado',
                    text: 'Guardado con éxito',
                    type: 'success',
                    showConfirmButton: false,
                        timer: 1700
                });

                var idCaja = $("#caja").val();
                var fecha = $("#fechaTickets").val();
                var table = $('#dtTickets').DataTable();
                table.destroy();
                mostrarTickets(idCaja,fecha);
                $('#modalAnulaTickets').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                

            }
            
        }
    });


   
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
        }
      
    }
});

 

$('#nombreProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        if($("#precioProducto").val()=='$ 0.00'){
            $("#labelPrecio").css("display","block");
        }else if(e.keyCode == 37 || e.keyCode == 39){}else{
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
        }
        else if(e.keyCode == 37 || e.keyCode == 39){}
        else{
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
        
    }
    else if(e.keyCode == 37 || e.keyCode == 39){

    }
    else{
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
    
    $("#descuentoPPlanilla").focus();
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

$("#aceptarPlanilla").keypress(function(e){
    if(e.keyCode==13){
        var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = "0.00";
            var cambio = "0.00";
            var usuario = $("#usuario").val();
            var descPlanilla = app.totalCuenta();
            var fechaFacturacion = $("#fechaFacturacion").val();

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
                        fechaFacturacion: fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();
                        }
                        
                    }
                }).then(function(){

                    imprimir2Tickets(carnet);
                    
                });
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
    $("#descuentoPSubs").focus();
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


$("#descuentoPPlanilla").keyup(function(e){
    if(e.keyCode=='13'){
        e.preventDefault();
        $("#cantidadEfectivoPPlanilla").focus();

    }else{
    var cuenta = app.totalCuenta();
    var descPlanilla = $(this).val();
    var remanenteCuenta = parseFloat(cuenta)-parseFloat(descPlanilla);

    if(isNaN(remanenteCuenta)){
        $("#RemanentePPlanilla").val('');
    }else{
        $("#RemanentePPlanilla").val(remanenteCuenta.toFixed(2));
    }
    }
   
});

$("#cantidadEfectivoPPlanilla").keyup(function(e){

    if(e.keyCode=='13'){
        e.preventDefault();
        
        var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivoPPlanilla").val();
            var cambio = $("#cambioPPlanilla").val();
            var usuario = $("#usuario").val();
            var descPlanilla = $("#descuentoPPlanilla").val();
            var fechaFacturacion = $("#fechaFacturacion").val();

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
                        fechaFacturacion: fechaFacturacion
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();   
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                    
                });

                
                
    }else{
    var cuenta = $("#RemanentePPlanilla").val();
    var efectivo = $(this).val();
    var cobro = parseFloat(efectivo)-parseFloat(cuenta);

    if(isNaN(cobro)){
        $("#cambioPPlanilla").val('');
    }else{
        $("#cambioPPlanilla").val(cobro.toFixed(2));
    }
    }
    
});


$("#descuentoPSubs").keyup(function(e){

    if(e.keyCode== 13){
        $("#cargarEnPlanilla").focus();
    }else{
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
    }
    
});

$("#cantidadEfectivoPSubs").keyup(function(e){
    if(e.keyCode == '13'){
        e.preventDefault();
        var remanente = $("#validarRemanente").val();
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivoPSubs").val();
            var cambio = $("#cambioPSubs").val();
            var usuario = $("#usuario").val();
            var descSubsidio = $("#descuentoPSubs").val();
            var descPlanilla = "0.00";
            var fechaFacturacion = $("#fechaFacturacion").val();

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
                        descPlanilla: descPlanilla,
                        fechaFacturacion : fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();
                        }
                        
                    }
                }).then(function(){
                    imprimirTicket(carnet);
                 
                    
                });

            }
    }else{
        var cuenta = $("#RemanentePSubs").val();
        var efectivo = $(this).val();
        var cobro = parseFloat(efectivo)-parseFloat(cuenta);

        if(isNaN(cobro)){
            $("#cambioPSubs").val('');
        }else{
            $("#cambioPSubs").val(cobro.toFixed(2));
        }
    }
 
});

function imprimirTicket(carnet){
    $("#siTckEfectivo").focus();
    $("#modalConfirmarTicketEfectivo").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    
                                
          
}


$("#siTckEfectivo").keyup(function(e){
   var carnet = $("#carnet").val();
    if(e.keyCode=='13'){
        $("#modalConfirmarTicketEfectivo").modal('hide');
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
            app.limpiar();  
            limpiarTicket(); 
            $("#carnet").val('');
            $("#carnet").focus();
            $(".divNombre").hide(); 
        }); 
    }
});

$("#noTckEfectivo").keyup(function(e){
   
   if(e.keyCode=='13'){
       $("#modalConfirmarTicketEfectivo").modal('hide');
   swal({
       title: 'Cobro Registrado',
       text: 'No se imprimirá el ticket',
       type: 'success',
       showConfirmButton: true,
               timer: 1500
       }).then((result) => {
        app.limpiar();  
        limpiarTicket(); 
           $("#carnet").val('');
           $("#carnet").focus();
           $(".divNombre").hide(); 
       }); 
   }
});



function imprimir2Tickets(carnet){
    $("#siTckDoble").focus();
    $("#modalConfirmarDoble").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}


$("#siTckDoble").keyup(function(e){
    var carnet = $("#carnet").val();
   if(e.keyCode=='13'){
       $("#modalConfirmarDoble").modal('hide');
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
            app.limpiar();  
            limpiarTicket(); 
            $("#carnet").val('');
            $("#carnet").focus();
            $(".divNombre").hide(); 
        }); 
   }
});

$("#noTckDoble").keyup(function(e){
  
  if(e.keyCode=='13'){
      $("#modalConfirmarDoble").modal('hide');
  swal({
      title: 'Cobro Registrado',
      text: 'No se imprimirá el ticket',
      type: 'success',
      showConfirmButton: true,
              timer: 1500
      }).then((result) => {
            app.limpiar();  
            limpiarTicket(); 
          $("#carnet").val('');
          $("#carnet").focus();
          $(".divNombre").hide(); 
      }); 
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
            var fechaFacturacion = $("#fechaFacturacion").val();

           $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Efectivo',
                        usuario: usuario,
                        fechaFacturacion : fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                         
                            app.guardarCobroDetalle();      
                               
                        }
                    }
                }).then(function(){
                    imprimirTicket(carnet);
                   // limpiarTicket(); 
                    
                });
                
});


$("#btnCobroDescuentoPPlanilla").click(function(){
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivoPPlanilla").val();
            var cambio = $("#cambioPPlanilla").val();
            var usuario = $("#usuario").val();
            var descPlanilla = $("#descuentoPPlanilla").val();
            var fechaFacturacion = $("#fechaFacturacion").val();
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
                        fechaFacturacion : fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();   
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                   
                });

                
           

                
});

$("#btnCobroDescuentoPlanilla").click(function(){
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = "0.00";
            var cambio = "0.00";
            var usuario = $("#usuario").val();
            var descPlanilla = app.totalCuenta();
            var fechaFacturacion = $("#fechaFacturacion").val();

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
                        fechaFacturacion: fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                  
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





$("#aceptarSubsidio").keypress(function(e){
    if(e.keyCode== 13){
        var remanente = $("#validarRemanente").val();


        var carnet = $("#carnet").val();
        var total = app.totalCuenta();
        var efectivo = "0.00";
        var cambio = "0.00";
        var usuario = $("#usuario").val();
        var descSubsidio = app.totalCuenta();
        var fechaFacturacion = $("#fechaFacturacion").val();

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
                    fechaFacturacion : fechaFacturacion,
                },
                url: '?1=CobrosController&2=guardarEncabezado',
                success: function (r) {
                    if (r == 1) {
                        app.guardarCobroDetalle();  
                    }
                    
                }
            }).then(function(){
                imprimirTicket(carnet);
                
            });
        }

    }
   
            
                
});


$("#cargarEnPlanilla").keyup(function(e){

    if(e.keyCode== '13'){
        $("#remanenteConEfectivo").css("display","none");
        $("#cargarEnPlanilla").prop("checked",true);
        $("#cargarEnEfectivo").prop("checked",false);
        $("#cantidadEfectivoPSubs").val('');
        $("#cambioPSubs").val('');

        var remanente = $("#validarRemanente").val();
            var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = "0.00";
            var cambio = "0.00";
            var usuario = $("#usuario").val();
            var descSubsidio = $("#descuentoPSubs").val();
            var descPlanilla = $("#RemanentePSubs").val();
            var fechaFacturacion = $("#fechaFacturacion").val();

            if(descSubsidio > remanente){
                swal({
                    title: 'Denegado',
                    text: 'El monto excede el monto disponible para subisidio',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                    });
            }
            else if(remanente < 0.01 ){
                swal({
                    title: 'Denegado',
                    text: 'Subsidio utilizado',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                    });
            }
            else{
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
                        descPlanilla: descPlanilla,
                        fechaFacturacion: fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                            app.guardarCobroDetalle();
                        }
                        
                    }
                }).then(function(){
                    imprimir2Tickets(carnet);
                   
                });

            }

    }
   
            
});


$("#cargarEnEfectivo").keyup(function(e){

if(e.keyCode == '13'){
    $("#remanenteConEfectivo").css("display","block");
        $("#cargarEnPlanilla").prop("checked",false);
        $("#cargarEnEfectivo").prop("checked",true);
        $("#cantidadEfectivoPSubs").val('');
        $("#cambioPSubs").val('');
        $("#cantidadEfectivoPSubs").focus();
} 
});



$("#cantidadEfectivo").keypress(function(e){
    if(e.keyCode == '13'){


        var carnet = $("#carnet").val();
            var total = app.totalCuenta();
            var efectivo = $("#cantidadEfectivo").val();
            var cambio = $("#cambio").val();
            var usuario = $("#usuario").val();
            var fechaFacturacion = $("#fechaFacturacion").val();


            if(efectivo == ''){
                swal({
                    title: 'Cobro Registrado',
                    text: 'Se imprimirá el ticket',
                    type: 'success',
                    showConfirmButton: true,
                    timer: 1500
                    });
            }else{
                $.ajax({
                    type: 'POST',
                    data: {
                        carnet: carnet,
                        total: total,
                        efectivo : efectivo,
                        cambio: cambio,
                        tipoPago: 'Efectivo',
                        usuario: usuario,
                        fechaFacturacion : fechaFacturacion,
                    },
                    url: '?1=CobrosController&2=guardarEncabezado',
                    success: function (r) {
                        if (r == 1) {
                         
                            app.guardarCobroDetalle();      
                               
                        }
                    }
                }).then(function(){
                   
                    imprimirTicket(carnet);
                    //limpiarTicket(); 
                });
            }

           
    }
    
});


$("#btnImprimirTicket").click(function(){
    var idTicket = $("#nTicket").val();

    $.ajax({
                type: 'POST',
                url: './app/Controllers/impresionTermica/ticketNormal2.php?id='+idTicket,
            }); 
});
</script>