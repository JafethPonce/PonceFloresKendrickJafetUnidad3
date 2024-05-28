<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog Site</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!--CDN SWEET ALERT-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="assets/img/xd.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/estilos.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Blog</a> <img src="assets/img/xd.png" alt=""></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Inicio</a></li>
          <li class="dropdown"><a href="#"><span>Cuentas</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="registro.php">Registrar</a></li>
              <ul>
                <li><a href="loginAdmin.php">Iniciar sesión</a></li>
              </ul>
          </li>
        </ul>
        </li>
        <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
        <li><a class="getstarted scrollto" href="login.php">Iniciar sesión</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <br>
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Bienvenido a tu blog personal</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Tu mejor aventura comienza aquí, en el mejor sitio para un blog</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Ver más</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/blog.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <!--Carrusel imagenes-->
    <section id="clients" class="clients clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/6.6.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/1.1.2.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/2.2.2.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/3.3.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/4.4.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/carrusel/5.5.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
          </div>
        </div>

      </div>
    </section>

    <section id="about" class="about">
      <div class="container">

        <div class="card-header" data-aos="fade-up">
          <h2>Notas</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <div class="card">
              <?php
              include_once "conexiondb.php";

              // Conectar a la base de datos
              $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
              if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
              }

              // Definir la consulta SQL
              $sql = "SELECT `Nombre`, `Nota`, `Fecha`, `Id_Nota` FROM `notas`";

              // Ejecutar la consulta SQL
              $resultSet = mysqli_query($conexion, $sql);

              // Verificar si la consulta SQL se ejecutó correctamente
              if (!$resultSet) {
                die("Error en la consulta SQL: " . mysqli_error($conexion));
              }

              // Verificar si hay resultados
              if (mysqli_num_rows($resultSet) > 0) {
                $counter = 0;  // Contador para limitar la cantidad de tarjetas

                while ($row = mysqli_fetch_row($resultSet)) {
                  // Verificar si $row no es false
                  if ($row !== false && $counter < 2) {
              ?>
                    <div class="card-body">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-text">
                            Nombre: <?php echo htmlspecialchars($row[0]); ?> <br>
                            Nota: <?php echo htmlspecialchars($row[1]); ?> <br>
                            Fecha: <?php echo htmlspecialchars($row[2]); ?> <br>
                            Id_Nota: <?php echo htmlspecialchars($row[3]); ?>
                          </p>
                        </div>
                      </div>
                    </div>
              <?php
                    $counter++;  // Incrementa el contador
                  }
                }
              } else {
                echo "No hay resultados para mostrar.";
              }

              // Cerrar la conexión a la base de datos
              mysqli_close($conexion);
              ?>
            </div>

            <a href="login.php" btn-get-started scrollto>Ver más</a>
          </div>

        </div>


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">

            <div class="section-title" data-aos="fade-up">
              <h2>Contactanos</h2>
            </div>

            <div class="row">

              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                  <h3>Blog Site</h3>
                  <p></p>
                  <div class="social-links">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                  <div>
                    <i class="ri-map-pin-line"></i>
                    <p>Universidad Tecnologica de Coahuila</p>
                  </div>

                  <div>
                    <i class="ri-mail-send-line"></i>
                    <p>blogsite@gmail.com</p>
                  </div>

                  <div>
                    <i class="ri-phone-line"></i>
                    <p>+52 844 678 5469</p>
                  </div>

                </div>
              </div>

              <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <form action="#" method="post">
                  <h2>Necesitas Ayuda?</h2>
                  <p>Si necesitas ayuda, puedes enviarnos un mensaje a WhatsApp:</p>
                  <a href="https://wa.me/8444982989?text=Hola,%20necesito%20ayuda" class="whatsapp-button">Enviar mensaje a WhatsApp</a>
                </form>
              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->
        <script type="text/javascript">
          document.querySelector('.stick').addEventListener('click', () => {
            document.querySelector('.four').value = '';

          });
        </script>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Blog Site</strong>. Todos los derechos son reservados.
          </div>
          <div class="credits">
            Hecho por <a href="#">Blog Site</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="index.php" class="scrollto">Inicio</a>
            <a href="#about" class="scrollto">Sobre nosotros</a>
            <a href="#">Privacidad</a>
            <a href="#">Terminos de uso</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>