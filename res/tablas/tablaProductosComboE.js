var tablaProductosCobroE;

function tablaProductosE(sucursal) {

$(function() {
    if($('#dtProductosCobroE').length) {
        tablaProductosCobroE = $('#dtProductosCobroE').DataTable({
            "ajax": {
                "url": "?1=CombosController&2=mostrarProductos&sucursal="+sucursal,
                "type": "POST"
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "codigo"
                },
                {
                    "data": "nombre"
                },  
                {
                    "data": "precioTabla"
                },
                {
                    "data": "Acciones"             
                }
            ],
            "order": [
                [1, "asc"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": false,
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            pageLength : 5,
            "info": false,
            "bLengthChange": false
        });

         // Ocultar columna de id de Usuario
         tablaProductosCobroE.column(0).visible(false);
    }

});
}