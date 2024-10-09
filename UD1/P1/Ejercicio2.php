// OPCION 1

<?php
$input = isset($_POST['input']) ? $_POST['input'] : '';
$input_command_inyection_words = ["id", "whoami", "ls", "sudo", "cd", "pwd"];
$valido = true;

foreach ($input_command_inyection_words as $command) {
    if ($command == $input) {
        $valido = false;
        break;
    }
}

if ($valido)
    echo "Input valido";
else
    echo "Input no valido";


// CODIGO HTML CON FORM

// <!DOCTYPE html>
// <html>

// <head>
//     <title>Prueba</title>
// </head>

// <body>
//     <h2>Login</h2>
//     <form action="ej2.php" method="POST">
//         <label for="input">Input:</label>
//         <input type="text" id="input" name="input" required><br><br>

//         <button type="submit">Enviar</button>
//     </form>
// </body>

// </html>


//OPCION 2

// <?php
// // $command_inyection_pattern = "/ls|whoami|cd/";
// $word = readline("Introduce la palabra: ");

// switch ($word) {
//     case str_contains($word, "ls");
//         echo $word . " no es una palabra admitida";
//         break;
//     case str_contains($word, "whoami");
//         echo $word . " no es una palabra admitida";
//         break;
//     case str_contains($word, "cd");
//         echo $word . " no es una palabra admitida";
//         break;
//     case str_contains($word, "id");
//         echo $word . " no es una palabra admitida";
//         break;
//     default:
//         echo $word . " Es una palabra admitida";
// }