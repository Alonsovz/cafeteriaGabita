<?php

require_once './app/composer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './app/composer/vendor/phpmailer/phpmailer/src/Exception.php';
require './app/composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './app/composer/vendor/phpmailer/phpmailer/src/SMTP.php';

class Mail {

    private $correoSistema = "colegioMongeRico.noReply@gmail.com";

    private $URL_SERVER = "svapplocal:8080/sim/";

    public function __construct() {

    }

    

    public function composeRestorePassMail($emailUsuario, $nomUsuario, $pass) {

        $emailFrom = $this->correoSistema;
        $emailFromName = 'Colegio Monge Rico';

        $emailTo = $emailUsuario;
        // $emailToName = $datosUsuario->nombre.' '. $datosUsuario->apellido;
        $emailToName = $nomUsuario;

        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Username = $this->correoSistema;
        $mail->Password = 'colegio123!';
        $mail->setFrom($emailFrom, $emailFromName);

        $mail->addAddress($emailTo, $emailToName);

        $mail->Subject = 'Control de Cuenta Colegio Monge Rico';

        $plantilla = file_get_contents('./app/mail/correoRestorePass.html');

        $plantilla = str_replace('%codigoPass%', $pass, $plantilla);

        $mail->msgHTML($plantilla);
        $mail->AddEmbeddedImage('./app/mail/logoMongeRico.jpg', 'logo');

        if($mail->Send())
        {
            return true;
        }
    }

   

}
