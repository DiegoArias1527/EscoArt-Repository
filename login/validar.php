<?php
echo "Hola mundo";
session_start();
include("con_db.php");

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
//$contrasena = hash('sha512', $contrasena);
$rol=   mysqli_query($conex, "SELECT * FROM `usuario` JOIN `cargo` ON usuario.id_cargo=cargo.id WHERE Correo_Usuario='$correo' AND  Contraseña='$contrasena'");
// Validar la existencia del correo
$validar_correo = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario='$correo'");
$roles = mysqli_fetch_assoc($rol);




if(mysqli_num_rows($validar_correo) > 0){
    $validar_contrasena = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario='$correo' AND Contraseña='$contrasena'");
    

    if(mysqli_num_rows($validar_contrasena) > 0){
        $_SESSION['usurio'] = $correo;
        if($roles['descripcion'] =="administrador"){//si el rol es igual a 1 admi, si no es igu al a usuarioy si no se cumple devuelve login

        header("location:../datatable/index.php");
        exit;
        }
    
      else if($roles['descripcion'] =="usuario"){//si el rol es igual a 1 admi, si no es igual a usuarioy si no se cumple devuelve login

            header("location:../index2.html");
            exit;
            
            } else {
                echo '
               <script>
                   alert("Usuario");
                   window.location ="iniciarsesion.php";
               </script>';
               exit;
           }
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

