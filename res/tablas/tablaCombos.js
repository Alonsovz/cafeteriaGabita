var tablaCombos;

function mostrarCombos(sucursal) {

$(function() {
    if($('#dtCombos').length) {
        tablaCombos = $('#dtCombos').DataTable({
            "ajax": {
                "url": "?1=CombosController&2=mostrarCombos&sucursal="+sucursal,
                "type": "POST"
            },
            "columns": [
                {
                    "data": "nombre"
                },  
                {
                    "data": "total"
                },
                {
                    "data": "sucursal"
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
        });

         // Ocultar columna de id de Usuario
         //tablaCombos.column(0).visible(false);
    }

});
}