
 <?php

 if($_SESSION["descRol"] == 'Administrador') {
     require_once 'dashboardAdmin.php';
 } else if($_SESSION["descRol"] == 'Cajero') {
    require_once 'dashboardCajero.php';
}

?>

</div>