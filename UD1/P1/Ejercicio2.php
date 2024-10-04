<?php
// $command_inyection_pattern = "/ls|whoami|cd/";
$word = readline("Introduce la palabra: ");

switch ($word) {
    case str_contains($word, "ls");
        echo $word . " no es una palabra admitida";
        break;
    case str_contains($word, "whoami");
        echo $word . " no es una palabra admitida";
        break;
    case str_contains($word, "cd");
        echo $word . " no es una palabra admitida";
        break;
    case str_contains($word, "id");
        echo $word . " no es una palabra admitida";
        break;
    default:
        echo $word . " Es una palabra admitida";
}
