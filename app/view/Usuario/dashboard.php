<script>
    /* $(function() {
    $('.contenedor').css('width', '100vw');
    $('.contenedor').css('padding', '10px 0px');
}); */
</script>

<br>
<div id="dashboard-grid" class="ui grid">

    <div class="row" id="dashboard-card">
        <h3 class="ui header">
            <b>
                <?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"]?>
                <div class="sub header">
                    <?php echo $_SESSION["email"]?>
            </b>
    </div>
    </h3>
</div>
<!--     <div class="row">
    <h1>
    <i class="envelope icon"></i> Mensajería
    </h1>
    </div>
 -->

 <?php

 if($_SESSION["descRol"] == 'Administrador/a') {
     require_once 'dashboardAdmin.php';
 } else if($_SESSION["descRol"] == 'Maestro/a') {
    require_once 'dashboardMaestros.php';
}else{
    require_once 'dashboardSecretaria.php';
}

?>

</div>