<?php
session_start();

if (isset($_SESSION['codigo_temporal']) && isset($_SESSION['hora_creacion_codigo'])) {

    $hora_creacion_codigo =  $_SESSION['hora_creacion_codigo'];
    $hora_actual = time();
    $codigoIngresado = $_POST['codigo'];

    if ($codigoIngresado == $_SESSION['codigo_temporal']) {
        if (($hora_actual - $hora_creacion_codigo) > 600) {
            echo 'La sesion ha expirado o el código no es correcto';
            session_destroy();
        } else
            echo '¡Hola! ;)';
    } else
        echo "El codigo ingresado " . $codigoIngresado . " es incorrecto";
} else
    echo "No se ha iniciado una sesión ";
