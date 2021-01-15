<div id="app">
    <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="file icon"></i>
                    Reportes <font color="#A7C520" size="20px">.</font>
                </div>
       </div>

    </div>
    <br><br>

    <form class="ui form">
        <h3 style="color:orange;">Ventas por cliente</h3>
        <div class="field">
            <div class="fields">
                <div class="three wide field">
                    <label><i class="warehouse icon"></i>Sucursal: </label>
                    <select name="sucursalR3" id="sucursalR3" class="ui dropdown">
                        <option value="0" set selected>Seleccione una opción</option>
                        <?php echo $sucursales; ?>
                    </select>
                </div>
                <div class="four wide field">
                    <label><i class="user icon"></i>Carnet de cliente:</label>
                    <input type="text" id="carnetCliente" name="carnetCliente">
                </div>

                <div class="three wide field">
                    <label><i class="calendar icon"></i>Fecha Inicio:</label>
                    <input type="date" id="fechaInicioR3" name="fechaInicioR3">
                </div>

                <div class="three wide field">
                    <label><i class="calendar icon"></i>Fecha fin:</label>
                    <input type="date" id="fechaFinR3" name="fechaFinR3">
                </div>

                <div class="three wide field">
                    <br>
                    <button class="ui orange button" id="btnReporte1">Generar reporte</button>
                </div>
            </div>
        </div>
    </form>

    <div class="ui divider"></div>

    <form class="ui form" >
        <h3 style="color:purple;">Ventas a todos los clientes</h3>
        <div class="field">
            <div class="fields">
                <div class="four wide field">
                    <label><i class="warehouse icon"></i>Sucursal: </label>
                    <select name="sucursalR1" id="sucursalR1" class="ui dropdown">
                        <option value="0" set selected>Seleccione una opción</option>
                        <?php echo $sucursales; ?>
                    </select>
                </div>

                <div class="four wide field">
                    <label><i class="calendar icon"></i>Fecha Inicio:</label>
                    <input type="date" id="fechaInicioR1" name="fechaInicioR1">
                </div>

                <div class="four wide field">
                    <label><i class="calendar icon"></i>Fecha fin:</label>
                    <input type="date" id="fechaFinR1" name="fechaFinR1">
                </div>

                <div class="four wide field">
                    <br>
                    <button class="ui purple button" id="btnReporte2">Generar reporte</button>
                </div>
            </div>
        </div>
    </form>

    <div class="ui divider"></div>

    <form class="ui form" style="">
        <h3 style="color:green;">Productos mas vendidos</h3>
        <div class="field">
            <div class="fields">
                <div class="four wide field">
                    <label><i class="warehouse icon"></i>Sucursal: </label>
                    <select name="sucursalRP" id="sucursalRP" class="ui dropdown">
                        <option value="0" set selected>Seleccione una opción</option>
                        <?php echo $sucursales; ?>
                    </select>
                </div>

                <div class="four wide field">
                    <label><i class="calendar icon"></i>Fecha Inicio:</label>
                    <input type="date" id="fechaInicioRP" name="fechaInicioRP">
                </div>

                <div class="four wide field">
                    <label><i class="calendar icon"></i>Fecha fin:</label>
                    <input type="date" id="fechaFinRP" name="fechaFinRP">
                </div>

                <div class="four wide field">
                    <br>
                    <button class="ui green button" id="btnGenerarProductos">Generar reporte</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="ui  modal" id="modalReporteCliente"  style="">

    <div class="header" style="background-color:#854A27; color:white;">
    <i class="users icon"></i><i class="file icon"></i> Reporte de cliente   </div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
            <div id="datosCliente">
            </div>
    </div>
    <div class="actions">
        <button  class="ui deny orange button">
            Cerrar
        </button>
    </div>
</div>


<div class="ui  modal" id="modalReporteClientes"  style="">

    <div class="header" style="background-color:#854A27; color:white;">
    <i class="users icon"></i><i class="file icon"></i>Reporte de clientes</div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
    <a id="btnReporte" class="ui green button">Exportar a Excel</a>
            <div id="datosClientes">
            </div>
    </div>
    <div class="actions">
        <button  class="ui deny orange button">
            Cerrar
        </button>
    </div>
</div>


<div class="ui  modal" id="modalReporteProductos"  style="">

    <div class="header" style="background-color:#854A27; color:white;">
    <i class="users icon"></i><i class="file icon"></i>Reporte de ventas en cantidad por producto</div>
    <div class="content" class="ui equal width form" style="background-color:#E0E0E0;">
            <div id="datosProductos">
            </div>
    </div>
    <div class="actions">
        <button  class="ui deny orange button">
            Cerrar
        </button>
    </div>
</div>

<script>



    $("#btnReporte1").click(function(e){

        e.preventDefault();
        var fecha1 = $("#fechaInicioR3").val();
        var fecha2 = $("#fechaFinR3").val();

        
        $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=ReportesController&2=detalleCliente',
                data: {
                    idSucursal:$("#sucursalR3").val(),
                    carnet:$("#carnetCliente").val(),
                    fecha1:$("#fechaInicioR3").val(),
                    fecha2:$("#fechaFinR3").val(),
                },
                success: function(r) {
                        $("#datosCliente").html(r);
                        $('#modalReporteCliente').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                }
        });
    });


    $("#btnReporte2").click(function(e){

        e.preventDefault();
        var fecha1 = $("#fechaInicioR2").val();
        var fecha2 = $("#fechaFinR2").val();


        $.ajax({
                cache: false,
                type: 'POST',
                url: '?1=ReportesController&2=detalleClientes',
                data: {
                    idSucursal:$("#sucursalR1").val(),
                    fecha1:$("#fechaInicioR1").val(),
                    fecha2:$("#fechaFinR1").val(),
                },
                success: function(r) {
                        $("#datosClientes").html(r);
                        $('#modalReporteClientes').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                }
        });
});


$("#btnReporte").click(function(){
    location.href = "./app/Controllers/reporteClientes.php?idSucursal="+$("#sucursalR1").val()+"&fecha1="+$("#fechaInicioR1").val()+"&fecha2="+$("#fechaFinR1").val();
});


$("#btnGenerarProductos").click(function(e){

    e.preventDefault();
$.ajax({
        cache: false,
        type: 'POST',
        url: '?1=ReportesController&2=detalleProductos',
        data: {
            idSucursal:$("#sucursalRP").val(),
            fecha1:$("#fechaInicioRP").val(),
            fecha2:$("#fechaFinRP").val(),
        },
        success: function(r) {
                $("#datosProductos").html(r);
                $('#modalReporteProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        }
});
});

</script>