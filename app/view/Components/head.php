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
    <script src="./res/plugins/dataTable/dataTable.jquery.min.js"></script>
    <script src="./res/plugins/dataTable/dataTable.semantic.min.js"></script>





    <!-- SweerAlert -->
    <script src="./res/plugins/sweetalert2.js"></script>

 
<link rel="stylesheet" href="./res/plugins/amaran.min.css">
<link rel="stylesheet" href="./res/plugins/animate.min.css">

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
