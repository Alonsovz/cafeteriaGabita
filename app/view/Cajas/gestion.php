<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="box icon"></i>
                    Cajas <font color="#210B61" size="20px">.</font>
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
                <table id="dtCajas" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #8E2800; color:white;">N°</th>
                            <th style="background-color: #8E2800; color:white;">Nombre</th>
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


<div class="ui tiny modal" id="modalAgregarCajas"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
    <i class="box icon"></i><i class="plus icon"></i> Agregar nueva caja
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmCajas" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
            <div class="field">
                <div class="fields">
                        <div class="eight wide field">
                            <label><i class="pencil icon"></i>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre de la área" id="nombre"
                            autocomplete="off"> 
                        </div>

                        <div class="eight wide field">
                            <label><i class="warehouse icon"></i>Sucursal</label>
                            <select name="sucursal" id="sucursal" class="ui dropdown">
                                <option value="0" set selected>Seleccione una opción</option>
                                <?php echo $sucursales; ?>
                            </select>
                        </div>
                </div>
            </div>  
        </form>
    </div>
    <div class="actions">
        <button onclick="limpiar()" class="ui deny orange button">
            Cancelar
        </button>
        <button class="ui green button" id="btnGuardarCajas" >
        Guardar
        </button>
    </div>
</div>


<div class="ui tiny modal" id="modalEditarCajas"  style="">

    <div class="header" style="background-color:#8E2800; color:white;">
        <i class="warehouse icon"></i><i class="pencil icon"></i> Editar área
    </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
        <form class="ui form" id="frmCajasE" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
                <div class="field">
                    <div class="fields">
                            <div class="eight wide field">
                                <label><i class="pencil icon"></i>Nombre</label>
                                <input type="text" name="nombreE" placeholder="Nombre de la área" id="nombreE"
                                autocomplete="off"> 
                                <input type="hidden" id="idEditar" name="idEditar">
                            </div>

                            <div class="eight wide field">
                                <label><i class="warehouse icon"></i>Sucursal</label>
                                <select name="sucursalE" id="sucursalE" class="ui dropdown">
                                    <option value="0">Seleccione una opción</option>
                                    <?php echo $sucursales; ?>
                                </select>
                            </div>
                    </div>
                </div>  
        </form>
    </div>
    <div class="actions">
        <button class="ui deny orange button">
            Cancelar
        </button>
        <button class="ui green button" id="btnEditarCajas" >
        Guardar
        </button>
    </div>
</div>

<div class="ui tiny modal" id="modalEliminar">

                <div class="header">
                    Eliminar Área
                </div>
                <div class="content">
                    <h4>¿Desea eliminar la área: <a id="name" style="color:blue;font-weight:bold;"></a>?</h4>
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

<script src="./res/tablas/tablaCajas.js"></script>




<script>

    function limpiar() {  
        $("#nombre").val();
     }
$('#btnModalRegistro').click(function() {
$('#modalAgregarCajas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnGuardarCajas").click(function(){
    if($("#nombre").val()==''){
        $("#labelNombre").css("display","block");
        $("#btnGuardarCajas").attr("disabled", true);

    }else{
        const form = $('#frmCajas');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=CajasController&2=registrar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalAgregarCajas').modal('hide');
                swal({
                    title: 'Caja Registrada',
                    text: 'Guardada con éxito',
                    type: 'success',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtCajas').DataTable().ajax.reload();
                limpiar();
            } 
        }
        });
    }
});


$("#nombre").keyup(function(){
    $("#labelNombre").css("display","none");
    $("#btnGuardarCajas").attr("disabled", false);
});


$(document).on("click", ".btnEditar", function () {
 $('#modalEditarCajas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#nombreE').val($(this).attr("nombre"));
 $('#sucursalE').dropdown("set selected", $(this).attr("sucursal"));
 $('#subsidioE').val($(this).attr("subsidio"));
 $('#idEditar').val($(this).attr("id"));
});

$("#btnEditarCajas").click(function(){
    if($("#nombreE").val()==''){
        $("#labelNombreE").css("display","block");
        $("#btnEditarCajas").attr("disabled", true);

    }else{
        const form = $('#frmCajasE');

        const datosFormulario = new FormData(form[0]);


        $.ajax({
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        cache: false,
        type: 'POST',
        url: '?1=CajasController&2=editar',
        data: datosFormulario,
        success: function(r) {
            if(r == 1) {
                $('#modalEditarCajas').modal('hide');
                swal({
                    title: 'Caja Editada',
                    text: 'Guardada con éxito',
                    type: 'warning',
                    showConfirmButton: false,
                        timer: 1700
                }).then((result) => {
                    if (result.value) {
                        location.href = '?';
                    }
                }); 
                $('#dtCajas').DataTable().ajax.reload();
               // limpiar();
            } 
        }
        });
    }
});

$("#nombreE").keyup(function(){
    $("#labelNombreE").css("display","none");
    $("#btnEditarCajas").attr("disabled", false);
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
                url: '?1=CajasController&2=eliminar',
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
                        $('#dtCajas').DataTable().ajax.reload();
                        //limpiar();
                    } 
                }
            });

        });
</script>