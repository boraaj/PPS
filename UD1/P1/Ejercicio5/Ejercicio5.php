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
    return true;
}

function validacion_local(string $parte_local)
{
    $invalid_dots = "/\.{2,}/";
    $inyection_chars_patters = "/['\" <>&;?!|%$()\[\]{}*+\-`~#]/";

    //Contiene entre 1 y 64 caracteres
    if (strlen($parte_local) > 64 || strlen($parte_local) < 1)
        return false;
    //contiene punto al principio y al final. 
    if ($parte_local[0] == "." || substr($parte_local, -1) == ".")
        return false;
    // posee mas de dos puntos consecutivos entre medio. 
    if (preg_match($invalid_dots, $parte_local))
        return false;
    //Contiene algun caracter especial entre comillas. 
    if (substr_count($parte_local, '"') == 2) {
        $primera_comilla = strpos($parte_local, '"');
        $segunda_comilla = strpos($parte_local, '"', $primera_comilla + 1);
        $substring_comillas = substr($parte_local, $primera_comilla + 1, $segunda_comilla - $primera_comilla - 1);
        //En este caso el caractere especial sería válido porque está escrito entre comillas. 
        if (preg_match($inyection_chars_patters, $substring_comillas))
            return true;
    }
    //Evaluar si contiene caracteres especiales que no estén entre comillas. 
    if (preg_match($inyection_chars_patters, $parte_local))
        return false;

    return true;
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
    return true;
}



function validacion_mail(string $email_entero)
{

    if (validacion_espacios_at_maxchars($email_entero)) {
        $parte_local_mail = explode("@", $email_entero)[0];
        if (validacion_local($parte_local_mail)) {
            $parte_domain_mail = explode("@", $email_entero)[1];
            if (validacion_domain($parte_domain_mail))
                //echo "validacion domain valida";
                return true;
            else
                //echo "Validacion domain invalida";
                return false;
        } else {
            //echo "validacion local invalida " . $parte_local_mail;
            return false;
        }
    } else
        //echo "Validacion General Invalida";
        return false;
}



//Main

$email = isset($_POST['email']) ? $_POST['email'] : '';

if (validacion_mail($email))
    echo "El mail es valido";
else
    echo "Mail no valido";


//Opcion 2 utilizando filter_var pero se salta algunas restriciones establecidas por los standares más extendidos como son el RFC 5321 RFC 5322
// function validacion_general_test(string $email)
// {
//     if (filter_var($email, FILTER_VALIDATE_EMAIL))
//         echo "mail valido";
//     else
//         echo "mail invallido";
// }
