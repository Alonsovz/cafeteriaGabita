<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafetería</title>

<!-- Favicon -->
<link rel="icon" type="image/png" href="./res/img/header.jpg">

    <!-- JQuery -->
    <script src="./res/plugins/jquery/jquery.js"></script>

    <!-- Vue.js -->
    <script src="./res/plugins/vue/vue.js"></script>

    <!-- Semantic UI -->
    <link rel="stylesheet" type="text/css" href="./res/plugins/semantic/semantics.css">
    <script src="./res/plugins/semantic/semantic.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./res/css/main.css">
    <link rel="stylesheet" type="text/css" href="./res/css/fondo-dot.css">

    <link rel="stylesheet" type="text/css" href="./res/css/fonts.css">
    <link rel="stylesheet" href="./res/plugins/ripple/ripple.css">
    <link rel="stylesheet" href="./res/plugins/Material-Icons/material-icons.css">

    <!-- JQueryMask -->
    <script src="./res/plugins/JQueryMask/jquery.mask.js"></script>

    <!-- JS -->
    <script src="./res/js/efectinis.js"></script>    
    <script src="./res/js/validar.js"></script>    
    <script src="./res/js/fondo-dot.js"></script>    
    <script src="./res/js/mask-inputs.js"></script>    
    <script src="./res/js/menu.js"></script>
    <script src="./res/plugins/ripple/ripple.js"></script>
    <script src="./res/plugins/ripple/ripple.init.js"></script>

    <!-- DataTable -->
    <link rel="stylesheet" href="./res/plugins/dataTable/dataTable.semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.semanticui.min.css">   
    <script src="./res/plugins/dataTable/dataTable.jquery.min.js"></script>
    <script src="./res/plugins/dataTable/dataTable.semantic.min.js"></script>



<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.semanticui.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>


    <!-- SweerAlert -->
    <script src="./res/plugins/sweetalert2.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>

<link rel="stylesheet" href="./res/plugins/amaran.min.css">
<link rel="stylesheet" href="./res/plugins/animate.min.css">
<script src="//cdn.jsdelivr.net/jquery.amaran/0.5.4/jquery.amaran.min.js"></script>

<link rel="stylesheet" type="text/css" href="./res/css/notie.min.css">
<script src="./res/plugins/notie.js"></script>
</head>
<body style="background-color: #FAFAFA !important;">

<div id="cosa"></div>
<script>
    $(document).ready(function () {
        $('.ui.dropdown')
            .dropdown();
    });
    alertify.defaults.title = "Confirmación";
alertify.defaults.transition = "zoom";
alertify.defaults.theme.ok = "ui green button";
alertify.defaults.theme.cancel = "ui black button";

alertify.defaults.theme.ok.title = "Si";
alertify.defaults.theme.cancel.title = "No";


var random = function(items)
                {
                    return items[Math.floor(Math.random()*items.length)];
                }
                var inEffects = ['slideRight','slideLeft','slideBottom','slideTop'];
                var positions = ['top left','top right','bottom right','bottom left'];


 var randomEntradas = function(items)
                {
                    return items[Math.floor(Math.random()*items.length)];
                }
                
                var entradas = ['bounceInRight','swing','tada','boundeInDown','bounceInRight','shake'];
                var salidas = ['fadeOutRight','rollOut','bounceOut','rollOut','slideBottom','zoomOutUp'];


                $('.special.cards .image').dimmer({
  on: 'hover'
});
</script>
