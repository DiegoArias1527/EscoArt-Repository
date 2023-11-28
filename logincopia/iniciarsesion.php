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
                       
                    
                       <button class="button" id="btnIniciarSesion">iniciar sesion</button>
                    </a>
                    </div>
                    </form>

                   
                </div>
                
            </div>
        </div>
    
        <script src="login.js"></script>

        
</body>
</html>


