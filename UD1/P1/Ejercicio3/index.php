<?php
session_start();

// Generar un código temporal (por ejemplo, 6 dígitos)
$codigoTemporal = rand(1000, 9999);

// Guardar el código en la sesión
$_SESSION['codigo_temporal'] = $codigoTemporal;

// Guardar la hora de creación para validar la expiración
$_SESSION['hora_creacion_codigo'] = time();
?>




<!DOCTYPE html>
<html>

<head>
    <title>Ej3</title>
</head>

<body>
    <h2>Ejercicio 3</h2>
    <h2>Tu código temporal es: <?php echo $codigoTemporal; ?></h2>
    <form action="Ejercicio3.php" method="POST">
        <label for="codigo">Introduce el código de accesso: </label>
        <input type="text" id="codigo" name="codigo" required><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>