<?php

session_start();
include("con_db.php");

if(isset($_POST['iniciar'])){

    $correo = mysqli_real_escape_string($conex, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conex, md5($_POST['contrasena']));
 
    $select = mysqli_query($conex, "SELECT * FROM `usuario` WHERE Correo_Usuario = '$correo' AND Contraseña = '$contrasena'") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['user_id'] = $row['Id_Usuario'];
       header("location:home.php");

    }else{
        echo '
        <script>
            alert("en correo y la contraseña son incorrectos");
            window.location ="iniciarsesion.php";
           
        </script>
    '; 
    }
 
 }
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style2.css">
    <title>Formulario inicio de sesion</title>

</body>

<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Si no tines una cuenta Registarte con nosotros</p>
            <p><a class="btn" href="register.php">Registrate</a></p>
            
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>--- Inicia Sesion ---</h2>
                
                <form class="form" ; action="validar.php" method="POST">
                    <label>
                        <i class='bx bx-envelope' ></i>
                        <input type="email" id="email" name="correo" placeholder="Correo electronico">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" id="contraseña" name="contrasena" placeholder="Contraseña">
                    </label> 
                       
                    
                       <button name="iniciar" class="button" id="btnIniciarSesion">iniciar sesion</button>
                    </a>
                    </div>
                    </form>

                   
                </div>
                
            </div>
        </div>


        
</body>
</html>


