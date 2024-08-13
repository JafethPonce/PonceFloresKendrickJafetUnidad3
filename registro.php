  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Registro - Blog Site</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/xd.png" rel="icon">
    <link rel="stylesheet" href="registro/src/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script src="assets/js/Alertasregister.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </head>

  <body>
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1><a href="index.php">Blog Site</a> <img src="assets/img/xd.png" alt=""></h1>
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="index.php">Inicio</a></li>

            <li><a class="getstarted scrollto" href="login.php">Iniciar sesión</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </header><!-- End Header -->
    <main id="main"> <br>
      <br>
      <br>


      <section id="about" class="about">
        <div class="container">
          <div class="wrapper fadeInDown">
            <div id="formContent">
              <h1>Registro</h1>
              <form method="post" action="BackRegistro.php" id="demo-form">
                <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="Nombres">
                <input type="text" id="apellidos" class="fadeIn third" name="apellidos" placeholder="Apellidos">
                <input type="text" id="celular" class="fadeIn third" name="celular" placeholder="Celular">
                <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
                <input type="password" id="psw" class="fadeIn third" name="psw" placeholder="Contraseña">
                <input type="password" id="pswconfirmar" class="fadeIn third" name="pswconfirmar" placeholder="Confirmar contraseña"> <br>
                <br>
                <label for="pregunta_secreta" class="fadeIn third">Pregunta Secreta</label>
              <select id="pregunta_secreta" class="fadeIn third" name="pregunta_secreta" required>
                <option value="" disabled selected>Selecciona una pregunta</option>
                <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
                <option value="¿Cuál es el nombre de tu escuela primaria?">¿Cuál es el nombre de tu escuela primaria?</option>
                <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
                <option value="¿Cuál es el segundo nombre de tu madre?">¿Cuál es el segundo nombre de tu madre?</option>
              </select>
              <input type="text" id="respuesta_secreta" class="fadeIn third" name="respuesta_secreta" placeholder="Respuesta" required>
              <br>
                <div class="g-recaptcha" data-sitekey="6LfiKOkpAAAAAHoXHfnEN6kPlLLWdFrXkMDJFUTd"></div>
                <input type="submit" class="fadeIn fourth" value="Registrar" name="registrar" id="registrar">
              </form>
              <div id="formFooter">
                ¿Ya tienes una cuenta?<a class="underlineHover" href="login.php">Iniciar sesión</a>

                Contactanos<a class="underlineHover" href="contacto.php">Contacto</a>
              </div>
            </div>
          </div>
      </section>

      <!-- Replace the variables below. -->
      <script>
        function onSubmit(token) {
          document.getElementById("demo-form").submit();
        }
      </script>

    </main>
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