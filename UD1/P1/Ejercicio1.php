<?php
$username_inyection_pattern = "/[!@#\$\%\^\&\*\(\)_\+\-=\{\}\[\]\|:;\'\",\.<>\/\?~`]/";
$pass_inyection_pattern = "/^(?=.*\d).{8,}$/";
$username = readline("Introduce el nombre de usuario: ");
$pass = readline("Introduce tu pass: ");

if (preg_match($username_inyection_pattern, $username) && !preg_match($pass_inyection_pattern, $pass)) {
    echo "Noooooo puedeeeeees pasaaaaaaar";
} else {
    echo "Bienvenido a la comarca";
}
