<?php
include_once "vendor/autoload.php";

use App\Models\Persona;

use PHPMailer\PHPMailer\Exception;
$IMC = 0;
if (isset($_POST['calcularIMC'])) {
    // Verifica que se haya hecho clic en el botón "Calcular IMC"
    
    $persona = new Persona($_POST['nombre'], floatval($_POST['peso']), floatval($_POST['altura']));
    if ($persona->obteneraltura() <= 0) {
        throw new Exception("La altura debe ser mayor que cero.");
    } else {
        $IMC = round($persona->obtenerpeso() / ($persona->obteneraltura() * $persona->obteneraltura()),1);
        if($IMC < 18.5){
            echo "El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra bajo peso";
        }else if($IMC >= 18.5 && $IMC <= 24.9){
            echo "El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en peso normal";
        }else if($IMC >= 25 && $IMC <= 29.9){
            echo "El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en sobrepeso";
        }else {  
            echo "El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en estado de obesidad ";
        }
    }
}

if (isset($_POST['generarPDF'])) {
    $persona = new Persona($_POST["nombre"], floatval($_POST["peso"]), floatval($_POST['altura']));
    if ($persona->obteneraltura() <= 0) {
        throw new Exception("La altura debe ser mayor que cero. por lo cual no se puede generar el pdf");
    } else {
        $IMC = round($persona->obtenerpeso() / ($persona->obteneraltura() * $persona->obteneraltura()),1);
        $mpdf = new \Mpdf\Mpdf();
        if($IMC < 18.5){
            $mpdf->WriteHTML("El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra bajo peso");
        }else if($IMC >= 18.5 && $IMC <= 24.9){
            $mpdf->WriteHTML("El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en peso normal");
        }else if($IMC >= 25 && $IMC <= 29.9){
            $mpdf->WriteHTML("El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en sobrepeso");
        }else {  
            $mpdf->WriteHTML("El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC} lo que indica que se encuentra en estado de obesidad ");
        }
        //$mpdf->WriteHTML("<h1> El usuario {$persona->obtenerNombre()} tiene un IMC de {$IMC}</h1>");
        $mpdf->Output();
    }
}

