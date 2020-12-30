<div id="app">
    <div class="ui grid">

        <div class="row title-bar">
            <div class="sixteen wide column">
                        <label style="font-weight:bold;font-size: 15px;">Seleccione caja a utilizar: </label> &nbsp;
                        <select name="caja" id="caja" class="ui dropdown">
                            <option value="0" set selected>Seleccione una opción</option>
                            <?php echo $cajas; ?>
                        </select>
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
                                <input type="text" id="precioProducto" name="precioProducto" readonly>
                                <input type="hidden" id="precioProductoDecimal" name="precioProductoDecimal" readonly>
                                
                            </div>

                            <div class="three wide field">
                                <label> <i class="plus icon"></i> Cantidad</label>
                                <input type="number" id="cantidadProducto" name="cantidadProducto" value="1">
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
                                            <input class="requerido" v-model="lista.codigoProductoL" name="codigoProductoL"
                                            id="codigoProductoL" type="text">
                                            </td>
                                        
                                            <td>  
                                            <input class="requerido" v-model="lista.nombreProductoL" name="nombreProductoL"
                                            id="nombreProductoL" type="text">
                                            </td> 

                                            <td>  
                                            <input class="requerido" v-model="lista.precioProductoL" name="precioProductoL"
                                            id="precioProductoL" type="text">
                                            <input class="requerido" v-model="lista.precioProductoDecimalL" name="precioProductoDecimalL"
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

                    <div class="three wide field divLista" style="text-align:center;display:none;">
                        <a style="font-weight: bold; font-size: 18px; color: #854a27;margin-left:20px;">Total:</a>

                        <a style="font-weight: bold; font-size: 18px; color: #420187;margin-left:20px;" id="totalCuenta"></a>
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
                acum += parseFloat(p.precioProductoDecimalL) 
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
                    })
                    .catch(err => {
                        $('#codigoProducto').val('');
                        $('#precioProducto').val('');
                        $('#precioProductoDecimal').val('');
                    });
            }
        }
    });


    $(document).ready(function(){
        app.eliminarDetalleLista(0);
        var total = 0;


        $("#caja").change(function(){
            var text = $("#caja option:selected").text();
            var idCaja = $(this).val();
            $("#nombreCaja").text(text);
            $("#vista").show();
            $(".divProductos").show();

            var table = $('#dtProductosCobro').DataTable();
            table.destroy();
            tablaProductos(idCaja);

           
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


$('#codigoProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
    }
});

 

$('#nombreProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(".divLista").show();
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
    }
});
</script>