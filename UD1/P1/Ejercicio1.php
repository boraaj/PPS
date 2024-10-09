<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$username_inyection_pattern = "/[!@#\$\%\^\&\*\(\)_\+\-=\{\}\[\]\|:;\'\",\.<>\/\?~`]/";
$pass_inyection_pattern = "/^(?=.*\d).{8,}$/";

if (preg_match($username_inyection_pattern, $username) || !preg_match($pass_inyection_pattern, $password))
    echo "Noooooo puedeeeeees pasaaaaaaar";
else
    echo "Bienvenido a la comarca";


// CODIGO HTML CON FORM 

// <!DOCTYPE html>
// <html>

// <head>
//     <title>Ej1</title>
// </head>

// <body>
//     <h2>Login</h2>
//     <form action="ej1.php" method="POST">
//         <label for="username">Username:</label>
//         <input type="text" id="username" name="username" required><br><br>

//         <label for="password">Password:</label>
//         <input type="password" id="password" name="password" required><br><br>

//         <button type="submit">Login</button>
//     </form>
// </body>

// </html>