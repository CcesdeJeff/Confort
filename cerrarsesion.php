<?php

//La sesion esta iniciada
session_start();

//Crear un arreglo de la sesion
$_SESSION=array();

//Destruir la sesión
session_destroy();

//Cuando se cierra sesión vamoa redirigir a la pagina de login

//header("location:login.php"); Esta es para pasar de una a login sin alerta
echo "<script>
window.alert('Vuelve pronto :(');
window.location.href='login.php'
</script>";
?>