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
    <title>Menú lateral responsive - MagtimusPro</title>

    <link rel="stylesheet" href="../php/css/estilosindex.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <img src="../php/Img/Logo Inmo.png" alt="">
            <h4>Confort</h4>
        </div>

        <div class="options__menu">	

            <a href="welcome.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="registro.html">
                <div class="option">
                    <i class="far fa-file" title="Registro"></i>
                    <h4>Registro</h4>
                </div>
            </a>
            
            <a href="actualizar.html">
                <div class="option">
                    <i class="fas fa-video" title="Actualizar"></i>
                    <h4>Actualizar</h4>
                </div>
            </a>

            <a href="eliminar.html">
                <div class="option">
                    <i class="far fa-sticky-note" title="Eliminar"></i>
                    <h4>Eliminar</h4>
                </div>
            </a>

            <a href="../php/loginMayor.html">
                <div class="option">
                    <i class="far fa-id-badge" title="Usuario"></i>
                    <h4>Usuario</h4>
                </div>
            </a>
            <a href="../php/cerrarsesion.php">
                <div class="option">
                    <i class="far fa-address-card" title="Cerrar sesión"></i>
                    <h4>Cerrar sesión</h4>
                </div>
            </a>
        </div>

    </div>

    <main>
        <h1>Bienvenidos</h1><br>
        <h3>Estos son los asesores del mes</h3>
        <div class="mes">
            <div class="asesor1">
                <h2>Sandra Duarte</h2>
                <img src="../php/Img/asesor1.jpg" alt="">
                <p>Cualidades del asesor</p>
            </div>
            <div class="asesor2">
                <h2>Jenny Padierna</h2>
                <img src="../php/Img/asesor2.jpeg" alt="">
                <p>Cualidades del asesor</p>
            </div>
            <div class="asesor3">
                <h2>Carmen Rojas</h2>
                <img src="../php/Img/asesor3.jpg" alt="">
                <p>Cualidades del asesor</p>
            </div>
        </div>
    </main>

    <script src="../js/script.js"></script>
</body>
</html>