<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$username_inyection_pattern = "/[!@#\$\%\^\&\*\(\)_\+\-=\{\}\[\]\|:;\'\",\.<>\/\?~`]/";
$pass_inyection_pattern = "/^(?=.*\d).{8,}$/";

if (preg_match($username_inyection_pattern, $username) || !preg_match($pass_inyection_pattern, $password))
    echo "Noooooo puedeeeeees pasaaaaaaar";
else
    echo htmlspecialchars("Hola " . $username . " Bienvenido a la comarca");
