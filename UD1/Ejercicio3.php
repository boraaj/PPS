<?php
$session_token = rand(1000, 10000);
$continue = 's';
while ($continue == 's') {
    echo "Este es tu token de sesión: \n" . $session_token;
    echo "\nTienes 5 segundoss para usarlo";

    sleep(5);

    $continue = readline("\n¿Quieres volver a solicitar un token? s/n : ");
    ncurses_erase();
}

echo "Adiós ";
