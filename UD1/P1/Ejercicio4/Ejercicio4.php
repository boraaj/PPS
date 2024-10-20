<?php
$url = isset($_POST['url']) ? $_POST['url'] : '';
$inyection_chars_patters = "/['\"<>&;?!|%$()\[\]{}*+\-`~#]/";

if (filter_var($url, FILTER_VALIDATE_URL)) {
    if (str_contains($url, "https://www.fpmislata.com") && !preg_match($inyection_chars_patters, $url))
        echo htmlspecialchars("La URL: " . $url . " es válida");
    else
        echo "URL no valida";
}
