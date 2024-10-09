<?php
$url = isset($_POST['url']) ? $_POST['url'] : '';
$inyection_chars_patters = "/['\"<>&;?!|%$()\[\]{}*+\-`~#]/";

if (str_contains($url, "https://www.fpmislata.com") && !preg_match($inyection_chars_patters, $url))
    echo ("URL valida");
else
    echo "URL no valida";


//HTML CON FORM

// <!DOCTYPE html>
// <html>

// <head>
//     <title>Prueba</title>
// </head>

// <body>
//     <h2>Login</h2>
//     <form action="ej4.php" method="POST">
//         <label for="url">URL:</label>
//         <input type="text" id="url" name="url" required><br><br>

//         <button type="submit">Enviar</button>
//     </form>
// </body>

// </html>