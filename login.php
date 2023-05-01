<?php
session_start(); 

if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']===true){
    header('location:welcome.php');
    exit;
}
include_once('conexion.php');
$username = $password ="";
$username_err = $password_err="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(empty(trim($_POST['usuario']))){
            $username_err="Por favor ingrese un usuario";
        }
        else{
            $username=trim($_POST['usuario']);//guardando en la variable usuario el dato escrito en el input
        }
    ////Verificar que el campo password no este vacio   
    if(empty(trim($_POST['clave']))){
        $password_err="Por favor ingrese una contraseña valida";
    }
    else{
        $password=trim($_POST['clave']);// es el mismo que en javascript document.get
    }
    if(empty($username_err) && empty ($password_err)){
        $sql="SELECT id,usuario,clave FROM registro WHERE usuario =?";

        if($prepare=mysqli_prepare($conexion,$sql)){
            mysqli_stmt_bind_param($prepare,"s",$parametro_usuario);

            $parametro_usuario=$username;

            if(mysqli_stmt_execute($prepare)){
                mysqli_stmt_store_result($prepare);

                if(mysqli_stmt_num_rows($prepare)==1){
                    mysqli_stmt_bind_result($prepare,$id,$username,$password_oculta);

                    if(mysqli_stmt_fetch($prepare)){
                        //mysqli_stmt_fetch sirve para leer los resultados de acuerdo a una consulta

                        if(password_verify($password,$password_oculta=password_hash($password, PASSWORD_DEFAULT))){
                            session_start();

                            $_SESSION['loggedin']=true;
                            $_SESSION['id']=$id;
                            $_SESSION['user']=$username;

                            header('location:welcome.php');
                        }
                        else{
                            $password_err="La contraseña no es correcta";
                        }
                    }
                }
                    else{
                        $username_err="No existe una cuenta registrada con este usuario";
                    }
                }
                else{
                    echo "Algo salio mal, por favor vuelve a intentarlo";
                }
            }
            mysqli_stmt_close($prepare);
        }
        mysqli_close($conexion);
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
    <style> 
        *{
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
            font-family: 'Roboto Condensed', sans-serif;
            text-decoration: none;  
        }
        .logo img{
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .todo{
            border: 1px solid white;
            padding: 10px;
            text-align: center;
        }
        .contenedor{
            width: 350px;
            padding: 20px;
            align-items: center;
            color: white;
            
        }
        body{
            background-color: black;
        }
        .btn{
            background-color: white;
            padding: 10px;
            
        }
    </style>
</head>
<body>
    <div class='contenedor'>
        <div class="logo">
            <img src="Imagenes/Logo Inmo.png" alt="">
        </div>
        <h2>Bienvenido</h2>
        <p>
            Por favor ingresar sus datos para iniciar sesion
        </p>
        <form action="" method="post" class="todo">
        <!--- este renglon siguiente es para validar que no tenga ningun error el nombre de usuario  -->
            <div class="form-group" <?php echo (!empty ($username_err)) ? 'has-error' : ''; ?>> 
           
            <label for="">Usuario</label>
            <input type="text" name="usuario" class="form-control" value=" <?php echo $username;?>">
            <span class="help-block"><?php echo $username_err; ?> </span>

            </div>
            <!-- en este renglon se hace el input de la contraseña y se le ingrsa directamente en los div el codigo php llamando las variables que necesitamos -->
            <div class = "form-group" <?php  echo  (!empty ($password_err)) ? 'has-error': ''; ?>>
            <label for="">Contraseña</label>
            <input type="password" name="clave" class="form-control" value=" <?php echo $password; ?> ">
            <span class="help-block"><?php echo $password_err; ?> </span>
            <div class="form-group">
                <input type="submit" value="ingresar" class=" btn">
            </div>
        </div>
        </form>
        <p> ¿No tienes cuenta? <a href="registro.php">Registrate aquí</a></p>

    </div>

    
</body>
</html>