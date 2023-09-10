<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="http://localhost/php-medio/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
    <h1 class="title">Calculadora IMC</h1>
    <form action="calculos.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
        <label for="peso">Peso en kg</label>
        <input type="number" class="form-control" name="peso" id="peso">
        <label for="altura">Altura en centimetros</label>
        <input type="number" class="form-control" name="altura" id="altura">
        <br>
        <input class="btn btn-primary" name="calcularIMC" type="submit" value="Calcular IMC">
        <input class="btn btn-success" name="generarPDF" type="submit" value="Generar IMC en pdf">
        <br>
        <br>
        <label class="datos" for="altura">Otra opcion de envio de datos</label>
        <br>
        <a class="input" href="formularioCorreo.php">Enviar IMC a correo</a>
     

    </form>



</body>

</html>