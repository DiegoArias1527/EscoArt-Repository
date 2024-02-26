<?php

 require '../carrito/config/database.php';
 $db = new Database();
 $con = $db->conectar();

 $sql = $con->prepare("SELECT Id_Producto, Nom_Producto, Precio_Producto FROM productos WHERE activo=0");
 $sql->execute();
 $resultado = $sql->fetchall(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EscoArt</title>

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css"> 
    
    
    

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="../index2.html">
                EscoART
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index2.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.html">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../carrito/index.php">Tienda</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="../index.html">
                        <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>




    <!-- carrito-productoo -->

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">ESCOART</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo"></h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-hand-index-thumb-fill"></i> Todos los productos</button>
                    </li>
                    <li>
                        <button id="abrigos" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Oficina</button>
                    </li>
                    <li>
                        <button id="camisetas" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Escolar</button>
                    </li>
                    <li>
                        <button id="pantalones" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Artistico</button>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito" href="./carrito.html">
                            <i class="bi bi-cart-fill"></i> Carrito <span id="numerito" class="numerito">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2023 ESCOART</p>
            </footer>
        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal">Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
                <!-- Esto se va a rellenar con JS -->
            </div>
        </main>
    </div>

    <div class="pie-pagina">
        <div class="contenedor-piepagina contenedor">
            <div class="info">
                <h3>Contactanos</h3>
                <p>EscoArt@gmail.com</p>
                <p>gerente.escoart@gmail.com</p>
            </div>
            <div class="info">
                <h3>Atencion Al Cliente</h3>
                <p>lunes-domingo</p>
                <p>302-319-11-78</p>
            </div>
            <div class="info">
                <h3>Redes</h3>
                <p>enterate de lo ultimo</p>
                <div class="redes-sociales redes-pie">
                    <button onclick="irAFacebook()">
                        <i class="fab fa-facebook-square"></i>
                    </button>
                    <button onclick="irATwitter()">
                        <i class="fab fa-twitter-square"></i>
                    </button>
                    <button onclick="irAInstagram()">
                        <i class="fab fa-instagram"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer">
            <p>Todos los derechos reservados &copy; 2023 EscoArt, desarrollado por DISAINT_INT</p>
        </footer>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/menu.js"></script>
    <script>
        function irAFacebook() {
          window.location.href = "https://www.facebook.com/";
        }
      </script>
      <script>
        function irATwitter() {
          window.location.href = "https://www.twitter.com/";
        }
      </script>
      <script>
        function irAInstagram() {
          window.location.href = "https://www.instagram.com/";
        }
      </script>
</body>
</html>