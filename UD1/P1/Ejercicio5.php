<?php

// Estandares RFC 5321 RFC 5322
//Ejercicio 5: Validación de correo electrónico (2 puntos) Crea un programa PHP que solicite a los usuarios ingresar una dirección de correo electrónico. 
//El programa deberá validar si la dirección de correo electrónico es válida según el estándar. Si la dirección no es válida, muestra un mensaje de error.

//Validaciones generales 
// punto al final yt al principio del correo. 
//Punto al principio del host. Justo después del @
//sin arroba 
//spacio menos en parte local si esta entre ""



function validacion_espacios_at_maxchars(string $email)
{

    if (substr_count($email, "@") > 1 || substr_count($email, "@") < 1)
        return false;
    if (str_contains($email, " ") || count_chars($email > 320))
        return false;
    return true;
}

function validacion_local(string $parte_local): bool
{

    $invalid_dots = "/\.{2,}/";
    if (substr_count($parte_local, "@") || $parte_local[0] == "." || substr($parte_local, -1) == ".")
        return false;

    if (preg_match($invalid_dots, $parte_local))
        return false;





    return true;
}



function email_valido(string $email): bool
{

    if (validacion_espacios_at_maxchars($email))
        return true;

    return false;
}


$input_email = readline("Insotruce tu correo electrónico: ");

    // generales . 
