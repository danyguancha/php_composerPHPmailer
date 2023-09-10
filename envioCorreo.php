<?php
include_once "vendor/autoload.php";
use App\Models\Correo;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$IMC =0;
$salida = "";
if (isset($_POST['enviarCorreo'])) {
    $correo = new Correo($_POST["nombre"], floatval($_POST["peso"]),floatval($_POST["altura"]), $_POST["correoOrigen"], $_POST["correoDestino"]);
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com.';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dany.1701627413@ucaldas.edu.co';
        $mail->Password   = 'micontraseña';
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];
        
        $mail->setFrom("{$correo->obtenerEmailOrigen()}", 'Usuario prueba origen');
        $mail->addAddress("{$correo->obtenerEmailDestino()}");

        $IMC = round($correo->obtenerpeso() / ($correo->obteneraltura() * $correo->obteneraltura()),1);
        
       
        $mail->isHTML(true);
        $mail->Subject = 'CALCULO IMC';
        if($IMC < 18.5){
            $mail->Body = "El usuario {$correo->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra bajo peso";
        }else if($IMC >= 18.5 && $IMC <= 24.9){
            $mail->Body = "El usuario {$correo->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en peso normal";
        }else if($IMC >= 25 && $IMC <= 29.9){
            $mail->Body = "El usuario {$correo->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en sobrepeso";
        }else {  
            $mail->Body = "El usuario {$correo->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en estado de obesidad ";
        }

        $mail->send();
        echo "Enviado correctamente";
    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }

}



