<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inicio EscoART</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/separador.css">
    <link href="./assets/fontawesome/fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet"> 
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index2.html">
                EscoART
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index2.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./carrito/index.php">Tienda</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="./index.html">
                        <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                </div>
                <div class="bx bx-envelope">
                    <a class="nav-icon position-relative text-decoration-none" href="./login/update_profile.php">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
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



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_01.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>EscoART</b> Tienda Virtual</h1>
                                <h3 class="h2">Productos de calidad al mejor precio</h3>
                                <p>
                                    En EscoART encontraras una gran variedad de productos de una excelente calidad a un muy buen precio.
                                    Garantizando siempre la satisfaccion del cliente con su compra.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_02.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Articulos de Todo Tipo</h1>
                                <h3 class="h2">Gran variedad de productos para escoger</h3>
                                <p>
                                    En EscoArt contamos con un catalogo muy amplio de productos de diferentes marcas
                                    para satisfacer todas las necesidades de nuestro clientes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_03.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Todo en un mismo lugar</h1>
                                <h3 class="h2">Sin necesidad de salir de tu casa </h3>
                                <p>
                                    Ahora no tendras la necesidad de salir de casa para tener los mejores productos escolares en tus manos
                                    con EscoArt puedes recibirlos en la puerta de tu casa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Inicio Categorias -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
                    Categorias mas vendidas en EscoArt<br>
                    Entra para ver que producotos ofrecen
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/category_img_01.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Colores</h5>
                <p class="text-center"><a class="btn btn-success">Comprar Ahora</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/category_img_02.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Cuadernos</h2>
                <p class="text-center"><a class="btn btn-success">Comprar Ahora</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/category_img_03.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Marcadores</h2>
                <p class="text-center"><a class="btn btn-success">Comprar Ahora</a></p>
            </div>
        </div>
    </section>
    <!-- Fin Categorias -->


    <!-- Inicio Productos Destacados -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos Destacados</h1>
                    <p>
                        Descubre nuestros productos destacados:
                        calidad y funcionalidad en un solo lugar. ¡Encuentra lo que buscas y déjate sorprender por nuestras mejores opciones!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="#">
                            <img src="./assets/img/feature_prod_1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$10.000</li>
                            </ul>
                            <a href="#" class="h2 text-decoration-none text-dark">Caja de Boligrafos Offi-Esco</a>
                            <p class="card-text">
                                Boligrafos marca Offi-Esco semi gel con punta de 0.7mm por 12 unidades
                            </p>
                            <p class="text-muted">Opiniones (34)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="#">
                            <img src="./assets/img/feature_prod_2.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$20.500</li>
                            </ul>
                            <a href="#" class="h2 text-decoration-none text-dark">Caja de colores Prismacolor</a>
                            <p class="card-text">
                                Lápices de colores de máxima suavidad, Mina Gruesa de 4mm, 
                                Pigmentos y ceras de alta calidad para colores más intensos y brillantes.
                            </p>
                            <p class="text-muted">Opinones (78)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="#">
                            <img src="./assets/img/feature_prod_3.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$150.000</li>
                            </ul>
                            <a href="#" class="h2 text-decoration-none text-dark">Cartuchera multiuso Totto</a>
                            <p class="card-text">
                                La Cartuchera multiuso Sobre es práctica, resistente y segura. 
                                Cuenta con dos organizadores amplios y está elaborada en un material de alta durabilidad
                            </p>
                            <p class="text-muted">Opiniones (24)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Productos Destacados -->

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


    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
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
    <!-- End Script -->
</body>

</html>