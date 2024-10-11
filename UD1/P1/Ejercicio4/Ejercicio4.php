<?php
$url = isset($_POST['url']) ? $_POST['url'] : '';
$inyection_chars_patters = "/['\"<>&;?!|%$()\[\]{}*+\-`~#]/";

if (str_contains($url, "https://www.fpmislata.com") && !preg_match($inyection_chars_patters, $url))
    echo ("URL valida");
else
    echo "URL no valida";
