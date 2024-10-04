<?php
    $user_input = readline("Pro favor, introduzca una URL: ");
    $inyection_chars_patters = "/['\"<>&;?!|%$()\[\]{}*+\-`~#]/";
    if(str_contains( $user_input, "https://www.fpmislata.com") && preg_match($inyection_chars_patters, $user_input))
        echo ("URL no válida");
    else 
        echo "URL válida";
    