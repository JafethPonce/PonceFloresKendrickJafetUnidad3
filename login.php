<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - Blog Site</title>
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
  <script src="assets/js/AlertasLogin.js"></script>
  <link href="assets/css/estilos.css" rel="stylesheet">

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
          <li><a class="getstarted scrollto" href="index.php">Inicio</a></li>
        </ul>
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <main id="main"> <br>
    <br>
    <br>
    <br>
    <br>


    <div class="wrapper fadeInDown">
      <div id="formContent">
        <h1>Iniciar sesión</h1>
        <form method="post" action="BackLogin.php" id="demo-form">
          <label for="celular">Celular o email:</label>
          <input type="text" id="celular" class="fadeIn third" name="celular">
          <label for="psw">Contraseña:</label>
          <input type="password" id="psw" class="fadeIn third" name="psw">
          <br>
          <div  class="g-recaptcha" data-sitekey="6LfiKOkpAAAAAHoXHfnEN6kPlLLWdFrXkMDJFUTd"></div>
          <input type="submit" class="fadeIn fourth" value="Iniciar sesión" name="iniciar" id="iniciar">

        </form>
        <div id="formFooter">
          ¿No tienes una cuenta?<a class="underlineHover" href="registro.php">Registrate</a>
        </div>

      </div>
    </div>



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