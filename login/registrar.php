<?php
include('con_db.php');

if(isset($_POST['registrar'])){
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $primerape = mysqli_real_escape_string($conex, $_POST['primerape']);
    $segundoape = mysqli_real_escape_string($conex, $_POST['segundoape']);
    $correo = mysqli_real_escape_string($conex, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conex, $_POST['contrasena']);
    $confirmarcontra = mysqli_real_escape_string($conex, $_POST['confirmarcontra']);

    // Capcha
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response']; 
    $secretkey = "6Lfyvx4pAAAAAN79Ni7Y515JOIg6zdVCTzJBIiAD";
    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip"); 
    $atributo = json_decode($respuesta, TRUE);

    if (!$atributo['success']) {
        echo '
        <script>
            alert("Verifica el Captcha");
            window.location = "register.php";
        </script>';
        exit;
    }
    
    $select = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario = '$correo'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        echo '
        <script>
            alert("Usuario ya existe");
            window.location ="register.php";
        </script>
        ';
    } else {
        if($contrasena != $confirmarcontra){
            echo '
            <script>
                alert("Las contraseñas no son correctas");
                window.location ="register.php";
            </script>
            ';
        } else {
            // Utilizar password_hash para encriptar la contraseña
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            $insert = mysqli_query($conex, "INSERT INTO usuario (Nom_Usuario, Primer_Apellido, Segundo_Apellido, Correo_Usuario, Contraseña, id_cargo) VALUES('$nombre', '$primerape', '$segundoape', '$correo' , '$hashed_password', 2)") or die('query failed');
            
            if($insert){
                echo '
                <script>
                    alert("Usuario registrado correctamente");
                    window.location ="iniciarsesion.php";
                </script>
                ';
            } else {
                echo '
                <script>
                    alert("Error al registrar el usuario");
                    window.location ="register.php";
                </script>
                ';
            }
        }
    }
}
?>



   
    
    
    

    


    

