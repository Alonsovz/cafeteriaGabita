<div id="sidebar" class="ui sidebar inverted vertical menu">
    <a class="header item" id="titulo-menu">
        <br>
        <b><i class="shopping cart icon"></i>El sazón de Gabita</b>
    </a>

    <?php

        if($_SESSION["descRol"] == 'Administrador') {
            require_once 'menuAdmin.php';
        } else if($_SESSION["descRol"] == 'Cajero') {
            require_once 'menuCajero.php';
        }

    ?>

</div>

<div class="pusher">
    <div class="contenedor">