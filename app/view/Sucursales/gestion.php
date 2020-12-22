<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="warehouse icon"></i>
                    Sucursales <font color="#210B61" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated orange labeled icon button" id="btnModalRegistro">
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
                <table id="dtSucursales" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #706960; color:white;">N°</th>
                            <th style="background-color: #706960; color:white;width: 60% !important;">Nombre</th>
                            <th style="background-color: #706960; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


<div class="ui tiny modal" id="modalAgregarSucursal"  style="">

    <div class="header" style="background-color:#706960; color:white;">
        <i class="warehouse icon"></i><i class="plus icon"></i> Agregar nueva sucursal
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmSucursal" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="sixteen wide field">
                            <label><i class="warehouse icon"></i>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre de la sucursal" id="nombre"
                            autocomplete="off"> 

                            <div class="ui red pointing label"  id="labelNombre"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Completa este campo
                            </div>

                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button onclick="limpiar()" class="ui deny orange button">
            Cancelar
        </button>
        <button class="ui green button" id="btnGuardarSucursal" >
        Guardar
        </button>
    </div>
</div>


<div class="ui tiny modal" id="modalEditarSucursal"  style="">

    <div class="header" style="background-color:#706960; color:white;">
        <i class="warehouse icon"></i><i class="pencil icon"></i> Editar sucursal
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmSucursalE" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="sixteen wide field">
                            <label><i class="warehouse icon"></i>Nombre</label>
                            <input type="text" name="nombreE" placeholder="Nombre de la sucursal" id="nombreE"
                            autocomplete="off"> 

                            <div class="ui red pointing label"  id="labelNombreE"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Completa este campo
                            </div>
                            <input type="hidden" name="idEditar" id="idEditar">
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button class="ui deny orange button">
            Cancelar
        </button>
        <button class="ui green button" id="btnEditarSucursal" >
        Guardar
        </button>
    </div>
</div>

<div class="ui tiny modal" id="modalEliminar">

                <div class="header">
                    Eliminar sucursal
                </div>
                <div class="content">
                    <h4>¿Desea eliminar la sucursal: <a id="name" style="color:blue;font-weight:bold;"></a>?</h4>
                    <input type="hidden"  id="idEliminar">
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right red button" id="btnEliminar">
                        Eliminar
                    </button>
                </div>
            </div>

</div>

<script src="./res/tablas/tablaSucursales.js"></script>




<script>
    function limpiar() {  
        $("#nombre").val();
     }
$('#btnModalRegistro').click(function() {
$('#modalAgregarSucursal').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnGuardarSucursal").click(function(){
    if($("#nombre").val()==''){
        $("#labelNombre").css("display","block");
        $("#btnGuardarSucursal").attr("disabled", true);

    }else{
        const form = $('#frmSucursal');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=SucursalesController&2=registrar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalAgregarSucursal').modal('hide');
                swal({
                    title: 'Sucursal Registrada',
                    text: 'Guardada con éxito',
                    type: 'success',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtSucursales').DataTable().ajax.reload();
                limpiar();
            } 
        }
        });
    }
});


$("#nombre").keyup(function(){
    $("#labelNombre").css("display","none");
    $("#btnGuardarSucursal").attr("disabled", false);
});


$(document).on("click", ".btnEditar", function () {
 $('#modalEditarSucursal').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#nombreE').val($(this).attr("nombre"));
 $('#idEditar').val($(this).attr("id"));
});

$("#btnEditarSucursal").click(function(){
    if($("#nombreE").val()==''){
        $("#labelNombreE").css("display","block");
        $("#btnEditarSucursal").attr("disabled", true);

    }else{
        const form = $('#frmSucursalE');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=SucursalesController&2=editar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalEditarSucursal').modal('hide');
                swal({
                    title: 'Sucursal Editada',
                    text: 'Guardada con éxito',
                    type: 'warning',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtSucursales').DataTable().ajax.reload();
               // limpiar();
            } 
        }
        });
    }
});

$("#nombreE").keyup(function(){
    $("#labelNombreE").css("display","none");
    $("#btnEditarSucursal").attr("disabled", false);
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
                url: '?1=SucursalesController&2=eliminar',
                data: {idEliminar},
                success: function(r) {
                    if(r == 1) {
                        $('#modalEliminar').modal('hide');
                        swal({
                            title: 'Eliminada',
                            text: 'Guardado con éxito',
                            type: 'error',
                            showConfirmButton: false,
                            timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtSucursales').DataTable().ajax.reload();
                        //limpiar();
                    } 
                }
            });

        });
</script>