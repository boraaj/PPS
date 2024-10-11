<?php

function generateToken(){
    $continue = true;
    while ($continue) {
        $session_token = rand(1000, 10000);
    
        echo "Este es tu token de sesión: \n" . $session_token;
        echo "\nTienes 5 segundoss para usarlo";
    
        sleep(5);
    
        $option = readline("\n¿Quieres volver a solicitar un token? (s/n) : ");
        if($option != "s")
            $continue = false;
            
    }
    echo "\nAdiós";
    return;
}

generateToken();