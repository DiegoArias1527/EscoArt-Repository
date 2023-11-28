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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Formulario registro </title>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Si ya tienes una cuenta inicia sesion con nosotros</p>
            <p><a class="btn" href="iniciarsesion.php">Inicar sesion</a></p>
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una cuenta</h2>
                
                <p>usa tu email para registrarte</p>
                <form action="registrar.php" class="form" method="POST">
                   <label>
                    <i class='bx bx-user' ></i>
                    <input type="text" name="nombre" pattern="[A-Za-z]{1,15}" placeholder="Nombres">
                </label>
                <label>
                    <i class='bx bx-user' ></i>
                    <input type="text" name="primerape" pattern="[A-Za-z]{1,20}" placeholder="Primer Apellido">
                </label>
                <label>
                    <i class='bx bx-user' ></i>
                    <input type="text" name="segundoape" pattern="[A-Za-z]{1,20}" placeholder="Segundo Apellido">
                </label>
            
                <label>
                    <i class='bx bx-envelope' ></i>
                    <input type="email" name="correo" placeholder="Correo electronico">
                </label>
                <label>
                    <i class='bx bx-lock-alt' ></i>
                    <input type="password" name="contrasena" placeholder="Contraseña">
                   </label>
                 <div class="cap">
                    <div class="g-recaptcha" data-sitekey="6Lfyvx4pAAAAAF4eQX-IPkZlRh82FrxLPuDmLPoP"></div>
                 </div>
                


                   <a  href="iniciar sesion.php" target="_blank">
                    <button class="button" name="registrar" >Registrate</button>
                </form>
            </div>
        </div>
    </div>
   
   
    <script src="registro.js"></script>

</body>
</html>