<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="shopping cart icon"></i>
                    Combos <font color="#8E2800" size="20px">.</font>
                </div>



        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
            <label><i class="warehouse icon"></i>Sucursal: </label> &nbsp;
                <select name="sucursal" id="sucursal" class="ui dropdown">
                    <option value="0" set selected>Seleccione una opción</option>
                    <?php echo $sucursales; ?>
                </select>
                <button class="ui right floated blue labeled icon button" id="btnModalRegistro">
                    <i class="plus icon"></i>
                    Agregar
                </button>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>

        <div class="row">
            <div class="sixteen wide column">
                <table id="dtCombos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #8E2800; color:white;">Nombre</th>
                            <th style="background-color: #8E2800; color:white;">Precio</th>
                            <th style="background-color: #8E2800; color:white;">Sucursal</th>
                            <th style="background-color: #8E2800; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


<div class="ui fullscreen modal" id="modalAgregarCombo"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
    <i class="plus icon"></i><i class="shopping cart icon"></i> Agregar nuevo combo a sucursal: 
    <a style="color:black; font-size: 17px;color:yellow;font-weight:bold;" id="sucursalModal"></a>
         
    </div>
    <div class="content" style="background-color:#E0E0E0;">
        <form class="ui form">
        <div class="field">
            <div class="fields">
                <div class="five wide field">
                        <table class="ui table" id="dtProductosCobro" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="background-color: black; color:white;">id</th>
                                    <th style="background-color: black; color:white;">Código</th>
                                    <th style="background-color: black; color:white;">Nombre</th>
                                    <th style="background-color: black; color:white;">Precio</th>
                                    <th style="background-color: black; color:white;"><i class="arrow up icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>


                <div class="nine wide field">
                    <form id="frmCombo" class="ui form" method="POST" method="POST" enctype="multipart/form-data">
                            <div class="field" style="width:90%; margin:auto;">
                                <div class="fields">

                                    <div class="six wide field">
                                        <label> <i class="pencil icon"></i> Nombre del combo</label>
                                        <input type="text" id="nombreCombo" name="nombreCombo" placeholder="Ingrese nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="field" style="width:90%; margin:auto;">
                                <div class="fields">

                                    <div class="four wide field">
                                        <label> <i class="barcode icon"></i> Código Producto</label>
                                        <input type="text" id="codigoProducto" name="codigoProducto">
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="pencil icon"></i> Nombre Producto</label>
                                        <input type="text" id="nombreProducto" name="nombreProducto">
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="dollar sign icon"></i> Precio Producto</label>
                                        <input type="text" id="precioProducto" name="precioProducto" readonly>
                                        <input type="hidden" id="precioProductoDecimal" name="precioProductoDecimal" readonly>
                                        
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="plus icon"></i> Cantidad</label>
                                        <input type="number" id="cantidadProducto" name="cantidadProducto" value="1">
                                    </div>

                                </div>    
                        </div>
                    </form>

                        
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
                                            <input class="requerido" readonly v-model="lista.sucursalL" name="sucursalL"
                                            id="sucursalL" type="hidden">

                                            
                                            <input class="requerido" readonly v-model="lista.nombreComboL" name="nombreComboL"
                                            id="nombreComboL" type="hidden">
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

                <div class="two wide field" style="text-align:center;">
                        <a style="font-weight: bold; font-size: 18px; color: #854a27;margin-left:20px;">Total:</a>

                        <a style="font-weight: bold; font-size: 18px; color: #420187;margin-left:20px;" id="totalCuenta"></a>

                       

                </div>

            </div>
        </div>
        </form>
        
                    
                    
    </div>
    <div class="actions">
        <button onclick="limpiar()" class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui green button" id="btnGuardarCombo" >
        Guardar
        </button>
    </div>
</div>


<div class="ui fullscreen modal" id="modalEditarCombo"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
    <i class="plus icon"></i><i class="shopping cart icon"></i> Editar combo: 
    <a style="color:black; font-size: 17px;color:yellow;font-weight:bold;" id="sucursalModal"></a>
         
    </div>
    <div class="content" style="background-color:#E0E0E0;">
        <form class="ui form">
        <div class="field">
            <div class="fields">
                <div class="five wide field">
                        <table class="ui table" id="dtProductosCobroE" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="background-color: black; color:white;">id</th>
                                    <th style="background-color: black; color:white;">Código</th>
                                    <th style="background-color: black; color:white;">Nombre</th>
                                    <th style="background-color: black; color:white;">Precio</th>
                                    <th style="background-color: black; color:white;"><i class="arrow up icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>


                <div class="nine wide field">
                    <form id="frmComboE" class="ui form" method="POST" method="POST" enctype="multipart/form-data">
                            <div class="field" style="width:90%; margin:auto;">
                                <div class="fields">

                                    <div class="six wide field">
                                        <label> <i class="pencil icon"></i> Nombre del combo</label>
                                        <input type="text" id="nombreComboE" name="nombreComboE" placeholder="Ingrese nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="field" style="width:90%; margin:auto;">
                                <div class="fields">

                                    <div class="four wide field">
                                        <label> <i class="barcode icon"></i> Código Producto</label>
                                        <input type="text" id="codigoProductoE" name="codigoProductoE">
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="pencil icon"></i> Nombre Producto</label>
                                        <input type="text" id="nombreProductoE" name="nombreProductoE">
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="dollar sign icon"></i> Precio Producto</label>
                                        <input type="text" id="precioProductoE" name="precioProductoE" readonly>
                                        <input type="hidden" id="precioProductoDecimalE" name="precioProductoDecimalE" readonly>
                                        
                                    </div>

                                    <div class="four wide field">
                                        <label> <i class="plus icon"></i> Cantidad</label>
                                        <input type="number" id="cantidadProductoE" name="cantidadProductoE" value="1">
                                    </div>

                                </div>    
                        </div>
                    </form>

                        
                        <form action="" class="ui form" id="frmListaE" >
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
                                            <tr v-for="(listaE, index) in listasE">
                                            <td>  
                                            <input class="requerido" readonly v-model="listaE.codigoProductoLE" name="codigoProductoLE"
                                            id="codigoProductoLE" type="text">
                                            <input class="requerido" readonly v-model="listaE.sucursalLE" name="sucursalLE"
                                            id="sucursalLE" type="hidden">

                                            
                                            <input class="requerido" readonly v-model="listaE.nombreComboLE" name="nombreComboLE"
                                            id="nombreComboLE" type="hidden">
                                            </td>
                                        
                                            <td>  
                                            <input class="requerido" readonly v-model="listaE.nombreProductoLE" name="nombreProductoLE"
                                            id="nombreProductoLE" type="text">
                                            </td> 

                                            <td>  
                                            <input class="requerido" readonly v-model="listaE.precioProductoLE" name="precioProductoLE"
                                            id="precioProductoLE" type="text">
                                            <input class="requerido" readonly v-model="listaE.precioProductoDecimalLE" name="precioProductoDecimalLE"
                                            id="precioProductoDecimalLE" type="hidden">
                                            </td>

                                            <td>  
                                            <input class="requerido" readonly v-model="listaE.cantidadProductoLE" name="cantidadProductoLE"
                                            id="cantidadProductoLE" type="text">
                                            </td>
                                            
                                            <td>
                                            <center>
                            </form>
                            <a  @click="eliminarDetalleListaE(index, listaE.nombreComboLE, listaE.codigoProductoLE, listaE.cantidadProductoLE, listaE.sucursalLE )" class="ui negative mini circular icon button"><i
                                class="times icon"></i></a>
                                </center>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                </div>

                <div class="two wide field" style="text-align:center;">
                        <a style="font-weight: bold; font-size: 18px; color: #854a27;margin-left:20px;">Total:</a>

                        <a style="font-weight: bold; font-size: 18px; color: #420187;margin-left:20px;" id="totalCuentaE"></a>

                       

                </div>

            </div>
        </div>
        </form>
        
                    
                    
    </div>
    <div class="actions">
        <button class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui deny green button" id="btnEditarCombo">
        Guardar
        </button>
    </div>
</div>

<div class="ui tiny modal" id="modalEliminar">

                <div class="header">
                    Eliminar combo
                </div>
                <div class="content">
                    <h4>¿Desea eliminar combo: <a id="name" style="color:blue;font-weight:bold;"></a>?</h4>
                    <input type="hidden"  id="idEliminar">
                    <input type="hidden"  id="idSucursalE">
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cerrar
                    </button>
                    <button class="ui right red button" id="btnEliminar">
                        Eliminar
                    </button>
                </div>
            </div>

</div>

<script src="./res/tablas/tablaProductosCombo.js"></script>
<script src="./res/tablas/tablaProductosComboE.js"></script>
<script src="./res/tablas/tablaCombos.js"></script>

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
            listasE: [{
                codigoProductoLE:'',
                nombreProductoLE: '',
                precioProductoLE: '',
                precioProductoDecimalLE:'',
                cantidadProductoLE:'',
            }]
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
                    sucursalL: $("#sucursal").val(),
                    nombreComboL: $("#nombreCombo").val(),
                });
            
            },

            totalCuenta() { 
            let acum = 0
            this.listas.forEach(p => {
                acum += parseFloat(p.precioProductoDecimalL) * parseFloat(p.cantidadProductoL)
            })
            return acum.toFixed(2);
            },
            eliminarDetalleListaE(index, combo, codigo, cantidad, idSucursal) {
                this.listasE.splice(index, 1);
                $("#totalCuentaE").text("$ "+this.totalCuentaE());

               


                $.ajax({
                                type: 'POST',
                                data: {
                                    combo: combo,
                                    codigo: codigo,
                                    idSucursal: idSucursal,
                                    cantidad : cantidad,
                                },
                                url: '?1=CombosController&2=eliminarElementoCombo',
                                success: function (r) {
                                    if (r == 1) {

                                        limpiar();
                                            
                                        var table1 = $('#dtCombos').DataTable();
                                        table1.destroy();
                                        mostrarCombos($("#sucursal").val());
                                    }
                                    
                                }
                            });


            },
            agregarDetalleListaE() {
                this.listasE.push({
                    codigoProductoLE: $("#codigoProductoE").val(),
                    nombreProductoLE: $("#nombreProductoE").val(),
                    precioProductoLE : $("#precioProductoE").val(),
                    precioProductoDecimalLE: $("#precioProductoDecimalE").val(),
                    cantidadProductoLE : $("#cantidadProductoE").val(),
                    sucursalLE: $("#sucursalE").val(),
                    nombreComboLE: $("#nombreComboE").val(),
                });
            
            },

            totalCuentaE() { 
            let acum = 0
            this.listasE.forEach(p => {
                acum += parseFloat(p.precioProductoDecimalLE) * parseFloat(p.cantidadProductoLE)
            })
            return acum.toFixed(2);
            },
              

            cargarDatosCodigo() {
                var codigo = $("#codigoProducto").val();
                var sucursal = $("#sucursal").val();

                fetch("?1=CombosController&2=getDatosProductoCodigoCombos&codigo=" + codigo+"&sucursal=" + sucursal)
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
                var sucursal = $("#sucursal").val();

                fetch("?1=CombosController&2=getDatosProductoNombreCombos&nombre=" + nombre+"&sucursal=" + sucursal)
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
            },

            cargarDatosCodigoE() {
                var codigo = $("#codigoProductoE").val();
                var sucursal = $("#sucursal").val();

                fetch("?1=CombosController&2=getDatosProductoCodigoCombos&codigo=" + codigo+"&sucursal=" + sucursal)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {
                        $('#nombreProductoE').val(dat.nombre);
                        $('#precioProductoE').val(dat.precioTabla);
                        $('#precioProductoDecimalE').val(dat.precioDecimal);
                    })
                    .catch(err => {
                        $('#nombreProductoE').val('');
                        $('#precioProductoE').val('');
                        $('#precioProductoDecimalE').val('');
                    });
            },

            cargarDatosNombreE() {
                var nombre = $("#nombreProductoE").val();
                var sucursal = $("#sucursal").val();

                fetch("?1=CombosController&2=getDatosProductoNombreCombos&nombre=" + nombre+"&sucursal=" + sucursal)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {
                        $('#codigoProductoE').val(dat.codigo);
                        $('#precioProductoE').val(dat.precioTabla);
                        $('#precioProductoDecimalE').val(dat.precioDecimal);
                    })
                    .catch(err => {
                        $('#codigoProductoE').val('');
                        $('#precioProductoE').val('');
                        $('#precioProductoDecimalE').val('');
                    });
            },
            guardarCombo() {

                if (this.listas.length) {

                    $('#frmCombo').addClass('loading');
                    $.ajax({
                        type: 'POST',
                        data: {
                            lista: JSON.stringify(this.listas)
                        },
                        url: '?1=CombosController&2=guardarCombo',
                        success: function (r) {
                            $('#frmCombo').removeClass('loading');
                            if (r == 1) {

                                swal({
                                    title: 'Combo Registrado',
                                    text: 'Guardado con éxito',
                                    type: 'success',
                                    showConfirmButton: false,
                                        timer: 1700
                                }).then((result) => {
                                    if (result.value) {
                                        location.href = '?';
                                    }
                                }); 
                                var table = $('#dtProductosCobro').DataTable();
                                table.destroy();
                                tablaProductos(sucursal);

                                var table1 = $('#dtCombos').DataTable();
                                table1.destroy();
                                mostrarCombos(sucursal);
                                limpiar();             
                            }
                            
                        }
                    });
                }

            },
            limpiar(){
                this.listasE = [];
                this.listas = [];
            },
            cargarDatosCombo(nombre,sucursal) {

                fetch("?1=CombosController&2=getDatosCombos&nombre="+nombre+"&sucursal=" + sucursal)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        dat.forEach(element => {
                            this.listasE.push({
                            codigoProductoLE: element["codigo"],
                            nombreProductoLE: element["nombre"],
                            precioProductoLE : element["precioTabla"],
                            precioProductoDecimalLE: element["precioDecimal"],
                            cantidadProductoLE : element["cantidad"],
                            sucursalLE: $("#sucursal").val(),
                            nombreComboLE: $("#nombreComboE").val(),
                        });
                        
                });
                        
                    })
                    .catch(err => {
                    });
            },
        }
    });

</script>

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
    $(document).ready(function(){
        app.eliminarDetalleLista(0);
        app.eliminarDetalleListaE(0);
    });
$('#btnModalRegistro').click(function() {
    if($("#sucursal").val()=='0'){
        swal({
            title: 'Advertencia',
            text: 'Seleccione una sucursal',
            type: 'error',
            showConfirmButton: false,
            timer: 1700
        });
    }else{
        app.limpiar();
        limpiar();
        $("#nombreCombo").val('');
        $('#modalAgregarCombo').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        $("#sucursalModal").text($("#sucursal option:selected").text());
    }
});


$("#sucursal").change(function(){
            var text = $("#caja option:selected").text();
            var sucursal = $(this).val();

            var table = $('#dtProductosCobro').DataTable();
            table.destroy();
            tablaProductos(sucursal);

            var table1 = $('#dtCombos').DataTable();
            table1.destroy();
            mostrarCombos(sucursal);
}); 

function limpiar(){
    $("#nombreProducto").val('');
    $("#codigoProducto").val('');
    $("#precioProducto").val('');
    $("#precioProductoDecimal").val('');
    $("#cantidadProducto").val(1);

    $("#nombreProductoE").val('');
    $("#codigoProductoE").val('');
    $("#precioProductoE").val('');
    $("#precioProductoDecimalE").val('');
    $("#cantidadProductoE").val(1);
}


$("#btnGuardarCombo").click(function(){
    app.guardarCombo();
    
});


$(document).on("click", ".btnEditar", function () {
 $('#modalEditarCombo').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 var table = $('#dtProductosCobroE').DataTable();
            table.destroy();
            tablaProductosE($("#sucursal").val());

            $("#nombreComboE").val($(this).attr("nombre"));
            app.cargarDatosCombo($(this).attr("nombre"),$(this).attr("idSucursal"));
            
            $("#totalCuentaE").text($(this).attr("total"));
            app.limpiar();
});


$("#btnEditarCombo").click(function(){
    swal({
                    title: 'Combo Editado',
                    text: 'Guardado con éxito',
                    type: 'warning',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
    
});


$(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("nombre"));
            $('#idSucursalE').val($(this).attr("idSucursal"));
            $('#name').text($(this).attr("nombre"));
});


$("#btnEliminar").click(function(){
            var idEliminar=$("#idEliminar").val();
            var idSucursalE=$("#idSucursalE").val();
            $.ajax({
               
                type: 'POST',
                url: '?1=CombosController&2=eliminar',
                data: {idEliminar: idEliminar, idSucursalE: idSucursalE},
                success: function(r) {
                    if(r == 1) {
                        $('#modalEliminar').modal('hide');
                        swal({
                            title: 'Eliminado',
                            text: 'Guardado con éxito',
                            type: 'error',
                            showConfirmButton: false,
                            timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        var table1 = $('#dtCombos').DataTable();
                        table1.destroy();
                        mostrarCombos($("#sucursal").val());
                    } 
                }
            });
});

$("#codigoProducto").keyup(function(){
           app.cargarDatosCodigo();
        }); 

        $("#nombreProducto").keyup(function(){
           app.cargarDatosNombre();
        }); 


$('#codigoProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
    }
});


$('#cantidadProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
    }
});
 

$('#nombreProducto').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        app.agregarDetalleLista();
        $("#totalCuenta").text("$ "+app.totalCuenta());
    }
});







$("#codigoProductoE").keyup(function(){
           app.cargarDatosCodigoE();
        }); 

        $("#nombreProductoE").keyup(function(){
           app.cargarDatosNombreE();
        }); 


$('#codigoProductoE').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        var codigo = $('#codigoProductoE').val();
        var cantidad = $('#cantidadProductoE').val();
        var sucursal = $("#sucursal").val();
        var nombre = $("#nombreComboE").val();


        $.ajax({
                        type: 'POST',
                        data: {
                            codigo: codigo,
                            sucursal: sucursal,
                            nombre: nombre,
                            cantidad: cantidad,
                        },
                        url: '?1=CombosController&2=guardarComboE',
                        success: function (r) {
                            if (r == 1) {

                                limpiar();
                                    
                                var table1 = $('#dtCombos').DataTable();
                                table1.destroy();
                                mostrarCombos(sucursal);
                            }
                            
                        }
                    });

        app.agregarDetalleListaE();
        $("#totalCuentaE").text("$ "+app.totalCuentaE());
        limpiar();
    }
});


$('#cantidadProductoE').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        var codigo = $('#codigoProductoE').val();
        var cantidad = $('#cantidadProductoE').val();
        var sucursal = $("#sucursal").val();
        var nombre = $("#nombreComboE").val();


        $.ajax({
                        type: 'POST',
                        data: {
                            codigo: codigo,
                            sucursal: sucursal,
                            nombre: nombre,
                            cantidad: cantidad,
                        },
                        url: '?1=CombosController&2=guardarComboE',
                        success: function (r) {
                            if (r == 1) {

                                limpiar();
                                    
                                var table1 = $('#dtCombos').DataTable();
                                table1.destroy();
                                mostrarCombos(sucursal);
                            }
                            
                        }
                    });

        app.agregarDetalleListaE();
        $("#totalCuentaE").text("$ "+app.totalCuentaE());
        
        limpiar();
    }
});
 

$('#nombreProductoE').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        var codigo = $('#codigoProductoE').val();
        var cantidad = $('#cantidadProductoE').val();
        var sucursal = $("#sucursal").val();
        var nombre = $("#nombreComboE").val();


        $.ajax({
                        type: 'POST',
                        data: {
                            codigo: codigo,
                            sucursal: sucursal,
                            nombre: nombre,
                            cantidad: cantidad,
                        },
                        url: '?1=CombosController&2=guardarComboE',
                        success: function (r) {
                            if (r == 1) {

                                limpiar();
                                    
                                var table1 = $('#dtCombos').DataTable();
                                table1.destroy();
                                mostrarCombos(sucursal);
                            }
                            
                        }
                    });

        app.agregarDetalleListaE();
        $("#totalCuentaE").text("$ "+app.totalCuentaE());
        limpiar();
    }
});


$(document).on("click", ".btnEditarP", function () {
    $('#codigoProductoE').val($(this).attr("codigo"));
    $('#precioProductoE').val($(this).attr("precioTabla"));
    $('#precioProductoDecimalE').val($(this).attr("precioDecimal"));
    $('#nombreProductoE').val($(this).attr("nombre"));
});
</script>