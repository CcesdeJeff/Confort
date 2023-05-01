<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location:login.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pagina principal</title>

</head>
<body>
    <h1>Hola <b> 
        <?php echo htmlspecialchars($_SESSION['user']); ?> 
    </b> Bienvenid@ a nuestro sitio.</h1>
    <p>
        <a href=""class="btn btn-danger">Cambia tu contraseña</a>
        <a href="cerrarsesion.php" class="btn btn-danger">Cierra la sesion</a><br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nam nulla quas rem magni. Excepturi recusandae nobis repellat quis ipsum quasi? Sapiente, molestiae! Ducimus ab tempore a sequi sit atque.
    </p>
</body>
</html>