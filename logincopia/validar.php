<?php

session_start();
include("con_db.php");

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

// Validar la existencia del correo
$validar_correo = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario='$correo'");

if(mysqli_num_rows($validar_correo) > 0){
    $validar_contrasena = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario='$correo' AND Contraseña='$contrasena'");

    if(mysqli_num_rows($validar_contrasena) > 0){
        $_SESSION['usurio'] = $correo;
        header("location:../index2.html");
        exit;
    } else {
         echo '
        <script>
            alert("La contraseña no es válida");
            window.location ="iniciarsesion.php";
        </script>';
        exit;
    }
} else {
    // El correo no existe
    echo '
    <script>
        alert("El correo no existe");
        window.location ="iniciarsesion.php";
    </script>';
    exit;
}

?>

