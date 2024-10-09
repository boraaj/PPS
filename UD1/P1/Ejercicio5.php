<?php

// Estandares RFC 5321 RFC 5322
//Ejercicio 5: Validación de correo electrónico (2 puntos) Crea un programa PHP que solicite a los usuarios ingresar una dirección de correo electrónico. 
//El programa deberá validar si la dirección de correo electrónico es válida según el estándar. Si la dirección no es válida, muestra un mensaje de error.

//Validaciones generales 
// punto al final yt al principio del correo. 
//Punto al principio del host. Justo después del @
//sin arroba 
//spacio menos en parte local si esta entre ""



function validacion_espacios_at_maxchars(string $email_entero)
{

    if (substr_count($email_entero, "@") != 1)
        return false;
    elseif (str_contains($email_entero, " ") || strlen($email_entero) > 320)
        return false;
    else {
        $parte_local_mail = explode("@", $email_entero)[0];
        $parte_domain_mail = explode("@", $email_entero)[1];
        validacion_local($parte_local_mail, $parte_domain_mail);
    }
}

function validacion_local(string $parte_local, $parte_domain_mail)
{
    $parte_local_valida = false;
    $invalid_dots = "/\.{2,}/";
    $inyection_chars_patters = "/['\" <>&;?!|%$()\[\]{}*+\-`~#]/";

    //Contiene entre 1 y 64 caracteres
    if (strlen($parte_local) > 64 || strlen($parte_local) < 1)
        $parte_local_valida = false;
    //contiene @ o punto al principio y al final. 
    if (substr_count($parte_local, "@") || $parte_local[0] == "." || substr($parte_local, -1) == ".")
        $parte_local_valida = false;
    // posee mas de dos puntos consecutivos entre medio. 
    if (preg_match($invalid_dots, $parte_local))
        $parte_local_valida = false;
    //Contiene algun caracter especial entre comillas. 
    if (substr_count($parte_local, '"') == 2) {
        $primera_comilla = strpos($parte_local, '"');
        $segunda_comilla = strpos($parte_local, '"', $primera_comilla + 1);
        $substring_comillas = substr($parte_local, $primera_comilla + 1, $segunda_comilla - $primera_comilla - 1);
        //En este caso el caractere especial sería válido porque está escrito entre comillas. 
        if (preg_match($inyection_chars_patters, $substring_comillas))
            $parte_local_valida = true;
    } else
        $parte_local_valida = false;
    //Evaluar si contiene caracteres especiales que no estén entre comillas. 
    if (preg_match($inyection_chars_patters, $parte_local))
        $parte_local_valida = false;

    if ($parte_local_valida)
        return validacion_domain($parte_domain_mail);
}

function validacion_domain($parte_domain)
{
    $inyection_chars_patters = "/['\" <>&;?!|%$()\[\]{}*+\-`~#]/";
    $invalid_dots = "/\.{2,}/";
    if ($parte_domain[0] == "." || substr($parte_domain, -1) == ".")
        return false;
    if ($parte_domain[0] == "-" || substr($parte_domain, -1) == "-")
        return false;
    if (preg_match($invalid_dots, $parte_domain))
        return false;
    if (strlen($parte_domain) > 253)
        return false;
    if (preg_match($inyection_chars_patters, $parte_domain))
        return false;
}


//TODO DEPURAR ESTO. 
function validacion_mail(string $email_entero)
{

    if (validacion_espacios_at_maxchars($email_entero))
        echo "Email valido";
    else
        echo "Email invalido";
}

//Main

$email = isset($_POST['email']) ? $_POST['email'] : '';

validacion_mail($email);


// <!DOCTYPE html>
// <html>

// <head>
//     <title>Ej5</title>
// </head>

// <body>
//     <h2>Ejercicio 5</h2>
//     <form action="ej5.php" method="POST">
//         <label for="email">Email:</label>
//         <input type="text" id="email" name="email" required><br><br>

//         <button type="submit">Enviar</button>
//     </form>
// </body>

// </html>