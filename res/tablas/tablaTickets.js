var tablaTickets;

function mostrarTickets(sucursal,fecha) {

$(function() {
    if($('#dtTickets').length) {
        tablaTickets = $('#dtTickets').DataTable({
            "ajax": {
                "url": "?1=CobrosController&2=mostrarTickets&sucursal="+sucursal+"&fecha="+fecha,
                "type": "POST"
            },
            "columns": [
                {
                    "data": "idTicket"
                }, 
                {
                    "data": "carnet"
                },  
                {
                    "data": "cliente"
                },
                {
                    "data": "tipoPago"
                },
                {
                    "data": "efectivoRecibidoTck"
                },
                {
                    "data": "descPlanilla"
                },
                {
                    "data": "descSubsidio"
                },
                {
                    "data": "totalTkc"
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
         //tablaTickets.column(0).visible(false);
    }

});
}