<?php

session_start();
include '../../protectroute.php'; 
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio - Blog Site</title>
    <link href="../../assets/img/xd.png" rel="icon">
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--CDN EMOJIS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.css">

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Tablero principal </a>
                    </li>


                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Blog Site</a>
                    <a class="navbar-brand hidden" href="./"><img src="../../assets/img/xd.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">

                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bienvenido <?php echo $_SESSION['nombre']; ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="perfil.php"><i class="fa fa- user"></i>Mi Perfil</a>
                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i> <button id="cerrar" type="submit" class="btn btn-danger">Cerrar sesión</button> </a>
                        </div>
                    </div>

                </div>
            </div>

        </header>

        <div id="clock-container" class="fade-in">
            <div id="time" class="animate"></div>
            <div id="date" class="animate"></div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php include '../../breadcrumbs.php';
                generate_breadcrumbs(); ?>
            </ol>
        </nav>
        
        <!-- /#header -->

        <!-- Content -->
        <div class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-animated" data-toggle="modal" data-target="#addNoteModal">
                                Agregar Nota
                            </button>
                        </div>
                        <div class="row">
                            <div class="row">
                                <?php
                                include_once "../../conexiondb.php";
                                $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                                if ($conexion != true) {
                                    die("Error de conexion " . mysqli_connect_error());
                                }
                                $sql = "SELECT `Nombre`, `Nota`, `Fecha`, `Id_Nota` FROM `notas`";
                                $resultSet = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_row($resultSet)) {
                                ?>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Nombre: <?php echo $row[0]; ?> <br>
                                                    Nota:<?php echo $row[1]; ?> <br>
                                                    Fecha:<?php echo $row[2]; ?> <br>
                                                    Id:<?php echo $row[3]; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
              <!-- Contenedor para cargar el modal -->
            <div id="modalContainer"></div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- /#add-category -->
    </div>
    <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="#">Blog Site</a>
                    <form action="#" method="post">
                        <h2>Necesitas Ayuda?</h2>
                        <p>Si necesitas ayuda, puedes enviarnos un mensaje a WhatsApp:</p>
                        <a href="https://wa.me/8444982989?text=Hola,%20necesito%20ayuda" class="whatsapp-button">Enviar mensaje a WhatsApp</a>
                    </form>
                </div>

            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
    <script src="assets/js/line.js"></script>
    <script src="assets/js/session.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/procesonota.js"></script>
    <!--script para la inactividad-->
    <script src="../../assets/js/inactivity.js"></script>
    <script src="../../assets/js/Clock.js"></script>

    <!--Script para los emojis-->
    <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js"></script>
    <script src="assets/js/emojis.js"></script>

</body>
</html>