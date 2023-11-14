<?php
            
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

session_start();
$_SESSION['correo'] = $correo;

include("con_db.php");

$consulta = "SELECT * FROM usuario WHERE Correo_Usuario='$correo'";
$resultado = mysqli_query($conex, $consulta);


if ($fila = mysqli_fetch_assoc($resultado)) {
    
    $contrasena_db = $fila['contrasena'];

    if (password_verify($contrasena, $contrasena_db)) {
        header("location:../index2.html");
        exit(); 
    } else {
      
        echo "Contraseña incorrecta";
    }
} else {
   
    echo "Correo electrónico no registrado";
}

mysqli_close($conex);

?>