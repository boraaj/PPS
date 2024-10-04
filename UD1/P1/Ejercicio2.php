<?php
$command_inyection_pattern = "/ls|whoami|cd/";
$word = readline("Introduce la palabra: ");

if (preg_match($command_inyection_pattern, $word))
    echo "Esa palabra no está admitida";
else
    echo "Tu palabra => " . $word;
