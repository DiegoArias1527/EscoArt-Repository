<?php
session_start();
include("con_db.php");

if (isset($_POST['iniciar'])) {
    $correo = mysqli_real_escape_string($conex, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conex, $_POST['contrasena']);

    $validar_corrreo = mysqli_query($conex, "SELECT * FROM `usuario` WHERE Correo_Usuario = '$correo'") or die('query failed');

    if (mysqli_num_rows($validar_corrreo) > 0) {
        // Obtener la fila del resultado de la consulta
        $row = mysqli_fetch_assoc($validar_corrreo);
        $hashed_password = $row['Contraseña'];

        // Verificar la contraseña usando password_verify
        if (password_verify($contrasena, $hashed_password)) {
            $_SESSION['user_id'] = $row['Id_Usuario'];

            // Obtener el id_cargo del usuario
            $rol = mysqli_query($conex, "SELECT * FROM usuario JOIN cargo ON usuario.id_cargo=cargo.id WHERE Correo_Usuario='$correo'");
            $roles = mysqli_fetch_assoc($rol);

            $_SESSION['usurio'] = $correo;

            if ($roles['descripcion'] == "administrador") {
                header("location:../datatable/index.php");
                exit;
            } elseif ($roles['descripcion'] == "usuario") {
                header("location: ../index2.php");
                exit;
            } else {
                echo '
                <script>
                    alert("Bienvenido");
                    window.location ="../index2.php";
                </script>';
                exit;
            }
        } else {
            echo '
            <script>
                alert("El correo y la contraseña son incorrectos");
                window.location ="iniciarsesion.php";
            </script>';
            exit;
        }
    } else {
        echo '
        <script>
            alert("El correo y la contraseña son incorrectos");
            window.location ="iniciarsesion.php";
        </script>';
        exit;
    }
}
?>
