<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="shopping cart icon"></i>
                    Productos <font color="#A7C520" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">

            <label><i class="warehouse icon"></i>Sucursal a la que agregará los productos: </label> &nbsp;
                <select name="sucursal" id="sucursal" class="ui dropdown">
                    <option value="0" set selected>Seleccione una opción</option>
                    <?php echo $sucursales; ?>
                </select>


                <button class="ui right floated green labeled icon button" id="btnModalRegistro">
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
                <table id="dtProductos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #A7C520; color:white;">N°</th>
                            <th style="background-color: #A7C520; color:white;">Código</th>
                            <th style="background-color: #A7C520; color:white;">Nombre</th>
                            <th style="background-color: #A7C520; color:white;">Precio</th>
                            <th style="background-color: #A7C520; color:white;">Sucursal</th>
                            <th style="background-color: #A7C520; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<div class="ui modal" id="modalAgregarProductos"  style="">

    <div class="header" style="background-color:#A7C520; color:white;">
    <i class="shopping cart icon"></i><i class="plus icon"></i> Agregar nuevo producto
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmProductos" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="five wide field">
                            <label><i class="barcode icon"></i>Código</label>
                            <input type="text" name="codigo" id="codigo" placeholder="Código de producto">

                            <div class="ui red pointing label"  id="labelProducto"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Código ya existe
                            </div>
                        </div>
                        <div class="six wide field">
                            <label><i class="pencil icon"></i>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre del producto" id="nombre"
                            autocomplete="off"> 
                        </div>

                      
                        <div class="five wide field">
                            <label><i class="dollar sign icon"></i>Precio</label>
                            <input type="text" name="precio" placeholder="Precio del producto" id="precio"
                            autocomplete="off">
                            <input type="hidden" name="idSucursal" id="idSucursal">
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button onclick="limpiar()" class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui green button" id="btnGuardarProductos" >
        Guardar
        </button>
    </div>
</div>


<div class="ui modal" id="modalEditarProductos"  style="">

    <div class="header" style="background-color:#A7C520; color:white;">
        <i class="shopping cart icon"></i><i class="pencil icon"></i> Editar producto
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
    <form class="ui form" id="frmProductosE" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="five wide field">
                            <label><i class="barcode icon"></i>Código</label>
                            <input type="text" name="codigoE" id="codigoE" placeholder="Código de producto">
                            <div class="ui red pointing label"  id="labelProductoE"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Código ya existe
                            </div>
                        </div>
                        <div class="six wide field">
                            <label><i class="pencil icon"></i>Nombre</label>
                            <input type="hidden" name="idEditar" id="idEditar">
                            <input type="text" name="nombreE" placeholder="Nombre del producto" id="nombreE"
                            autocomplete="off"> 
                        </div>

                      
                        <div class="five wide field">
                            <label><i class="dollar sign icon"></i>Precio</label>
                            <input type="text" name="precioE" placeholder="Precio del producto" id="precioE"
                            autocomplete="off">

                            <input type="hidden" name="idSucursalE" id="idSucursalE">
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui green button" id="btnEditarProductos" >
        Guardar
        </button>
    </div>
</div>

<div class="ui tiny modal" id="modalEliminar">

                <div class="header">
                    Eliminar producto
                </div>
                <div class="content">
                    <h4>¿Desea eliminar el producto: <a id="name" style="color:blue;font-weight:bold;"></a>?</h4>
                    <input type="hidden"  id="idEliminar">
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

</div>


<script src="./res/tablas/tablaProductos.js"></script>
<script>

$(document).ready(function(){
    $('#precio').mask("###0.00", {reverse: true});
    $('#precioE').mask("###0.00", {reverse: true});

  
});

function limpiar(){
    $("#nombre").val('');
    $("#codigo").val('');
    $("#precio").val('');
}

    $("#sucursal").change(function(){
        var id = $(this).val();

        $("#idSucursal").val(id);
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
        limpiar();
        $('#modalAgregarProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }
    
});



$("#btnGuardarProductos").click(function(){
 
 const form = $('#frmProductos');

 const datosFormulario = new FormData(form[0]);


 $.ajax({
 enctype: 'multipart/form-data',
 contentType: false,
 processData: false,
 cache: false,
 type: 'POST',
 url: '?1=ProductosController&2=registrar',
 data: datosFormulario,
 success: function(r) {
     if(r == 1) {
         
         swal({
             title: 'Producto Registrado',
             text: 'Guardado con éxito',
             type: 'success',
             showConfirmButton: false,
                 timer: 1700
         }).then((result) => {
             if (result.value) {
                 location.href = '?';
             }
         }); 
         $('#dtProductos').DataTable().ajax.reload();
         limpiar();
     } 
 }
 });

});


$(document).on("click", ".btnEditar", function () {
 $('#modalEditarProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#nombreE').val($(this).attr("nombre"));
 $('#precioE').val($(this).attr("precio"));
 $('#codigoE').val($(this).attr("codigo"));
 $("#idSucursalE").val($(this).attr("sucursal"));
 $('#idEditar').val($(this).attr("id"));
});


$("#btnEditarProductos").click(function(){

        const form = $('#frmProductosE');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=ProductosController&2=editar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalEditarProductos').modal('hide');
                swal({
                    title: 'Producto Editado',
                    text: 'Guardado con éxito',
                    type: 'warning',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtProductos').DataTable().ajax.reload();
               // limpiar();
            } 
        }
        });
    
});


$(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
            $('#name').text($(this).attr("nombre"));
});

$("#btnEliminar").click(function(){
            var idEliminar=$("#idEliminar").val();
            $.ajax({
               
                type: 'POST',
                url: '?1=ProductosController&2=eliminar',
                data: {idEliminar},
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
                        $('#dtProductos').DataTable().ajax.reload();
                        //limpiar();
                    } 
                }
            });
});



$("#codigo").keyup(function(){

var codigo=$("#codigo").val();
var idSucursal=$("#idSucursal").val();

     $.ajax({
     type: 'POST',
     url: '?1=ProductosController&2=getProductoValidado',
     data:{codigo: codigo, idSucursal: idSucursal},
     success: function(r) {

             if(r==1)
             {
                 
                 $("#btnGuardarProductos").attr("disabled", true);
                 $("#labelProducto").css('display', 'block');
             }    
             else{
                $("#labelProducto").css('display', 'none');
                 $("#btnGuardarProductos").attr("disabled", false);
             }  
     }
         });

});


$("#codigoE").keyup(function(){

var codigo=$("#codigoE").val();
var idSucursal=$("#idSucursalE").val();

     $.ajax({
     type: 'POST',
     url: '?1=ProductosController&2=getProductoValidado',
     data:{codigo: codigo, idSucursal: idSucursal},
     success: function(r) {

             if(r==1)
             {
                 
                 $("#btnEditarProductos").attr("disabled", true);
                 $("#labelProductoE").css('display', 'block');
             }    
             else{
                $("#labelProductoE").css('display', 'none');
                 $("#btnEditarProductos").attr("disabled", false);
             }  
     }
         });

});
</script>