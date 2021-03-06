<?php

class UsuarioController extends ControladorBase {

    // Vistas
    public static function loginView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/login.php';
    }

    public static function registroForm() {
        self::loadHeadOnly();
        $dao = new DaoArea();
        $areas = $dao->mostrarAreas();
        require_once './app/view/Usuario/registro.php';
    }

    public static function dashboard() {
        self::loadMain();
        $dao = new DaoAreas();
        $sucursales = $dao->getSucursales();

        $dao1 = new DaoCajas();
        $cajas = $dao1->getCajas();
        require_once './app/view/Usuario/dashboard.php';
    }


    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Usuario/gestion.php';
    }

    public static function contraOlvidada() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/newPassword.php';
    }

    public static function resetPasswordView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/resetPassword.php';
    }

    public static function config() {
        self::loadMain();
        require_once './app/view/Usuario/config.php';
    }


    // Métodos

    public static function login() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);


        $dao = new DaoUsuario();
        $dao->objeto->setNomUsuario($datos->user);
        $dao->objeto->setPass($datos->pass);

        echo $dao->login();
        
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        self::loadHeadOnly();
        require_once './app/view/Usuario/login.php';
    }

    public function encodeString() {
        $enc = new Encode();

        $encoded = $enc->encode('e', $_REQUEST["string"]);

        echo $encoded;
    }

    public function resetPassword() {

        $enc = new Encode();

        $datos = json_decode($_REQUEST["datos"]);
        $nomUser = $enc->encode('d', $_REQUEST["user"]);

        $dao = new DaoUsuario();

        $dao->objeto->setPass($datos->pass);
        $dao->objeto->setNomUsuario($nomUser);

        echo $dao->resetPassword($datos->code);
    }

    public function registrar() {
       
        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setNomUsuario($_REQUEST["usuario"]);
        $dao->objeto->setPass($_REQUEST["pass"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setCodigoRol($_REQUEST["codigoRol"]);


        echo $dao->registrar();
        

    }

    public function cargarDatosNomUsuario() {
        $nom = $_REQUEST["userName"];

        $dao = new DaoUsuario();
        $dao->objeto->setNomUsuario($nom);

        $datosUsuario = $dao->datosNomUsuario();

        echo json_encode($datosUsuario);
    }

    public function newPass() {
        //Generador de contraseñas aleatorias
        $psswd = substr( md5(microtime()), 1, 8);

        $dao = new DaoUsuario();

        require './app/mail/Mail.php';
        $mail = new Mail();

        $datos = $_REQUEST["datos"];

        $id = $datos["userName"];
        $email = $datos["correo"];



        $dao->objeto->setNomUsuario($id);
        $dao->objeto->setEmail($email);

        

        if(!$mail->composeRestorePassMail($email, $id, $psswd)) {
            echo "El correo no fue enviado Correctamente";
        }

        echo $dao->reestablecer($psswd);
    }

    public function registrarExterno() {

    }

    public function editarNom()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $user = $_REQUEST["user"];

        $dao->objeto->setCodigoUsuario($id);
        $dao->objeto->setNomUsuario($user);
        echo $dao->editarUser();
    }


    public function getPass()
    {
            $pass=$_REQUEST['pass'];
            $dao= new DaoUsuario();
            $id=$_REQUEST['idU'];

            $dao->objeto->setCodigoUsuario($id);
            $contra=$dao->getPass();
            $passEncript=sha1($pass);
            $datos = array('pass' =>"$contra" ,'passEnc'=>"$passEncript" );
            $resp=json_encode($datos);
             echo $resp;

    }

    public function getUserName()
    {
        $dao=new DaoUsuario();
        $user=$_REQUEST['user'];
        $dao->objeto->setNomUsuario($user);

        echo $dao->getUserName();
    }
    public function getEmail(){
        $dao=new DaoUsuario();
        $email=$_REQUEST['email'];
        $user=$_REQUEST['user'];

        $dao->objeto->setEmail($email);
        $dao->objeto->setNomUsuario($user);
        echo $dao->getEmail();
    }

    public function getEmailM(){
        $dao=new DaoUsuario();
        $email=$_REQUEST['email'];
       

        $dao->objeto->setEmail($email);
      
        echo $dao->getEmailM();
    }


    public function getDui(){
        $dao=new DaoUsuario();
        $dui=$_REQUEST['dui'];
       

        $dao->objeto->setDui($dui);
      
        echo $dao->getDui();
    }


    public function reestablecerContra()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nuPass = $_REQUEST["nuPass"];

        $dao->objeto->setPass($nuPass);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->restablecerContraConfig();
    }

    public function actualizarDatosPersonales()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nomUser = $_REQUEST["nom"];
        $ape = $_REQUEST["ape"];

        $dao->objeto->setNombre($nomUser);
        $dao->objeto->setApellido($ape);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->cambiarDatos();
    }

    public function eliminarCuenta() {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->eliminarCuenta();
    }

    public function editar() {
       // $datos = $_REQUEST["datos"];

      //  $datos = json_decode($datos);

        $dao = new DaoUsuario();


        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setApellido($_REQUEST["apellidoE"]);
        $dao->objeto->setNomUsuario($_REQUEST["usuarioE"]);
        $dao->objeto->setEmail($_REQUEST["correoE"]);
        $dao->objeto->setTelefono($_REQUEST["telefonoE"]);
        $dao->objeto->setCodigoRol($_REQUEST["codigoRolE"]);
        $dao->objeto->setCodigoUsuario($_REQUEST["idDetalle"]);

        echo $dao->editar();
    }

    public function autorizar() {

        $dao = new DaoUsuario();

        require './app/mail/Mail.php';
        $mail = new Mail();

        $id = $_REQUEST["id"];
        $estado = $_REQUEST["estado"];

        $estadoCuenta = $estado == 1 ? 'Autorizada' : 'Restringida';

        $dao->objeto->setCodigoUsuario($id);

        $datosUsuario = json_decode($dao->cargarDatosUsuario());

        if(!$mail->composeAuthMail($datosUsuario, $estadoCuenta)) {
            echo "El correo no fue enviado Correctamente";
        }

        echo $dao->autorizar($estado);
    }

    public function cuentasAdministrador() {
        $dao = new DaoUsuario();

        var_dump($dao->cuentasAdministrador());
    }

    public function cargarDatosUsuario() {
        $id = $_REQUEST["id"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($id);

        echo $dao->cargarDatosUsuario();
    }

    public function eliminar() {
        $datos = $_REQUEST["idEliminar"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($datos);

        echo $dao->eliminar();
    }

    public function mostrarUsuarios() {
        $dao = new DaoUsuario();

        echo $dao->mostrarUsuarios();
    }

  
    public function aplicarSubsidio(){
        $idSucursal = $_REQUEST['idSucursal'];
        $mes = $_REQUEST['mes'];

        $dao = new DaoUsuario();

        echo $dao->aplicarSubsidio($idSucursal, $mes);
    }

}
