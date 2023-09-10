<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>correos</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="http://localhost/php-medio/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="title">Datos de correo</h1>
    <form action="envioCorreo.php" method="POST">
    <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
        <label for="peso">Peso en kg</label>
        <input type="number" class="form-control" name="peso" id="peso">
        <label for="altura">Altura en centimetros</label>
        <input type="number" class="form-control" name="altura" id="altura">
        <br>
        <label for="correoOrigen">Correo origen</label>
        <input type="text" class="form-control" name="correoOrigen" id="correoOrigen">

        <label for="correoDestino">Correo destino</label>
        <input type="text" class="form-control" name="correoDestino" id="correoDestino">
        <br>
        <input class="btn btn-secondary" name="enviarCorreo" type="submit" value="Enviar IMC a correo">

    </form>
</body>

</html>