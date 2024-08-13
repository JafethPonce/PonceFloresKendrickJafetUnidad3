<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Recuperar Contraseña - Blog Site</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/xd.png" rel="icon">
  <link rel="stylesheet" href="registro/src/style.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <main id="main"> <br><br><br><br><br>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <h1>Recupera tu contraseña</h1>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $showEmailForm = true;
        $showSecretQuestionForm = false;
        $email = "";
        $pregunta_secreta = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['buscar_email'])) {
                $email = $_POST['email'];

                // Buscar la pregunta secreta del usuario
                $sql = "SELECT pregunta_secreta FROM info_user WHERE email='$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $pregunta_secreta = $row['pregunta_secreta'];
                    $showEmailForm = false;
                    $showSecretQuestionForm = true;
                } else {
                    echo "<script>
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Email no encontrado.'
                        }).then(function() {
                          window.location = 'recuperar.php';
                        });
                        </script>";
                }
            } elseif (isset($_POST['cambiar_contrasena'])) {
                $email = $_POST['email'];
                $respuesta_secreta = $_POST['respuesta_secreta'];
                $nueva_psw = $_POST['nueva_psw'];
                $confirmar_psw = $_POST['confirmar_psw'];

                if ($nueva_psw != $confirmar_psw) {
                    echo "<script>
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Las contraseñas no coinciden.'
                        }).then(function() {
                          window.location = 'recuperar.php';
                        });
                        </script>";
                    exit();
                }

                $nueva_psw = password_hash($nueva_psw, PASSWORD_DEFAULT);

                // Verificar la respuesta secreta
                $sql = "SELECT * FROM info_user WHERE email='$email' AND respuesta_secreta='$respuesta_secreta'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $sql_update = "UPDATE info_user SET psw='$nueva_psw' WHERE email='$email'";
                    if ($conn->query($sql_update) === TRUE) {
                        echo "<script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Éxito',
                              text: 'Contraseña actualizada exitosamente.'
                            }).then(function() {
                              window.location = 'login.php';
                            });
                            </script>";
                    } else {
                        echo "<script>
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Error al actualizar la contraseña.'
                            }).then(function() {
                              window.location = 'recuperar.php';
                            });
                            </script>";
                    }
                } else {
                    echo "<script>
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Respuesta secreta incorrecta.'
                        }).then(function() {
                          window.location = 'recuperar.php';
                        });
                        </script>";
                }
            }
        }

        $conn->close();
        ?>

        <?php if ($showEmailForm): ?>
        <form method="post" action="recuperar.php">
          <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required>
          <input type="submit" class="fadeIn fourth" value="Buscar" name="buscar_email">
        </form>
        <?php endif; ?>

        <?php if ($showSecretQuestionForm): ?>
        <form method="post" action="recuperar.php">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <label for="respuesta_secreta"><?php echo $pregunta_secreta; ?></label>
          <input type="text" id="respuesta_secreta" name="respuesta_secreta" required>
          <input type="password" id="nueva_psw" name="nueva_psw" placeholder="Nueva Contraseña" required>
          <input type="password" id="confirmar_psw" name="confirmar_psw" placeholder="Confirmar Nueva Contraseña" required>
          <input type="submit" value="Cambiar Contraseña" name="cambiar_contrasena">
        </form>
        <?php endif; ?>
        
        <div id="formFooter"></div>
      </div>
    </div>
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
