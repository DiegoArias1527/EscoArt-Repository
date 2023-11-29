<?php
    
    include('con_db.php');
 
    $nombre = $_POST['nombre'];
    $primerape = $_POST['primerape'];
    $segundoape = $_POST['segundoape'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

   
   
    // Verificar que todos los campos estén llenos
    if (empty($nombre) || empty($primerape) || empty($segundoape) || empty($correo) || empty($contrasena)) {
    echo '
    <script>
        alert("Completa todos los campos para continuar");
        window.location = "register.php";
    </script>';
    exit;
    }


    // Verificar el Captcha
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


    $query = "INSERT INTO usuario (Nom_Usuario, Primer_Apellido, Segundo_Apellido, Correo_Usuario, Contraseña) 
    VALUES ('$nombre','$primerape','$segundoape','$correo','$contrasena')";



    // Verificar que el correo no se repita
    $verificar_correo = mysqli_query($conex, "SELECT * FROM usuario WHERE Correo_Usuario ='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("El correo ya está registrado, intenta con uno diferente");
                window.location = "register.php";
            </script>
        ';
        exit();
    }


    $ejecutar = mysqli_query($conex, $query);

    if($ejecutar){
     echo '
       <script>
        alert("Usuario registrado correctamente");
        window.location ="iniciarsesion.php";
     </script>
     ';

     }else{
     echo'
       <script>
         alert("Error intentelo nuevamente");
        window.location ="register.php";
      </script>
    ';
    }


    myqli_close($conex);
?>
