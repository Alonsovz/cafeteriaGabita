<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="users icon"></i>
                    Clientes <font color="#8E2800" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
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
                <table id="dtClientes" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #8E2800; color:white;">N°</th>
                            <th style="background-color: #8E2800; color:white;">Nombre</th>
                            <th style="background-color: #8E2800; color:white;">Carnet</th>
                            <th style="background-color: #8E2800; color:white;">Área</th>
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


<div class="ui modal" id="modalAgregarClientes"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
    <i class="users icon"></i><i class="plus icon"></i> Agregar nuevo cliente
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmClientes" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="six wide field">
                            <label><i class="pencil icon"></i>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre de la área" id="nombre"
                            autocomplete="off"> 
                        </div>

                        <div class="three wide field">
                            <label><i class="address card outline icon"></i>Carnet</label>
                            <input type="text" name="carnet" id="carnet" placeholder="N° de Carnet">
                        </div>
                        <div class="seven  wide field">
                            <label><i class="warehouse icon"></i>Área</label>
                            <select name="area" id="area" class="ui search dropdown">
                                <option value="0" set selected>Seleccione una opción</option>
                                <?php echo $areas; ?>
                            </select>
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button onclick="limpiar()" class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui green button" id="btnGuardarClientes" >
        Guardar
        </button>
    </div>
</div>


<div class="ui modal" id="modalEditarClientes"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
        <i class="user icon"></i><i class="pencil icon"></i> Editar cliente
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
    <form class="ui form" id="frmClientesE" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="six wide field">
                            <label><i class="pencil icon"></i>Nombre</label>
                            <input type="text" name="nombreE" placeholder="Nombre de la área" id="nombreE"
                            autocomplete="off"> 
                            <input type="hidden" name="idEditar" id="idEditar">
                        </div>

                        <div class="three wide field">
                            <label><i class="address card outline icon"></i>Carnet</label>
                            <input type="text" name="carnetE" id="carnetE" placeholder="N° de Carnet">
                        </div>
                        <div class="seven  wide field">
                            <label><i class="warehouse icon"></i>Área</label>
                            <select name="areaE" class="ui search dropdown" id="areaE">
                                <option value="0" set selected>Seleccione una opción</option>
                                <?php echo $areas; ?>
                            </select>
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button class="ui deny orange button">
            Cerrar
        </button>
        <button class="ui green button" id="btnEditarClientes" >
        Guardar
        </button>
    </div>
</div>

<div class="ui tiny modal" id="modalEliminar">

                <div class="header">
                    Eliminar cliente
                </div>
                <div class="content">
                    <h4>¿Desea eliminar al cliente: <a id="name" style="color:blue;font-weight:bold;"></a>?</h4>
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

<script src="./res/tablas/tablaClientes.js"></script>
<script>
    
$('#btnModalRegistro').click(function() {
    limpiar();
$('#modalAgregarClientes').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

function limpiar(){
    $("#nombre").val('');
    $("#carnet").val('');
    //$("#area").dropdown("set selected",0);
}
$("#btnGuardarClientes").click(function(){
 
        const form = $('#frmClientes');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=ClientesController&2=registrar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
               // $('#modalAgregarClientes').modal('hide');
                swal({
                    title: 'Cliente Registrado',
                    text: 'Guardado con éxito',
                    type: 'success',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtClientes').DataTable().ajax.reload();
                limpiar();
            } 
        }
        });
    
});


$(document).on("click", ".btnEditar", function () {
 $('#modalEditarClientes').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#nombreE').val($(this).attr("nombre"));
 $('#areaE').dropdown("set selected", $(this).attr("area"));
 $('#carnetE').val($(this).attr("carnet"));
 $('#idEditar').val($(this).attr("id"));
});


$("#btnEditarClientes").click(function(){

        const form = $('#frmClientesE');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=ClientesController&2=editar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalEditarClientes').modal('hide');
                swal({
                    title: 'Cliente Editado',
                    text: 'Guardado con éxito',
                    type: 'warning',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtClientes').DataTable().ajax.reload();
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
                url: '?1=ClientesController&2=eliminar',
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
                        $('#dtClientes').DataTable().ajax.reload();
                        //limpiar();
                    } 
                }
            });
});
</script>