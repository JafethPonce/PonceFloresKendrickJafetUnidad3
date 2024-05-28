<?php
require_once 'conexion.php';
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica si se ha proporcionado la respuesta de reCAPTCHA
  if (isset($_POST['g-recaptcha-response'])) {
    // Clave secreta de reCAPTCHA proporcionada por Google
    $secretKey = '6LfiKOkpAAAAAHrbo9O2MYrwFfgvcODWAEP-1sK_';

    // Captura la respuesta de reCAPTCHA
    $captchaResponse = $_POST['g-recaptcha-response'];

    // Hace una solicitud POST a la API de verificación de reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
      'secret' => $secretKey,
      'response' => $captchaResponse
    ];

    $options = [
      'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
      ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseData = json_decode($response, true);

    // Verifica si la respuesta de reCAPTCHA es válida
    if ($responseData && $responseData['success']) {
      //El trim lo puse para que quite los espacios al inicio y final de la cadena
      $nombre = trim($_POST['nombre']);
      $apellidos = trim($_POST['apellidos']);
      $celular = trim($_POST['celular']);
      $email = trim($_POST['email']);
      $psw = trim($_POST['psw']);

      // Inicializar un array para almacenar los errores
      $errors = [];

      // Validar el nombre
      if (empty($nombre)) {
        $errors[] = "El nombre es obligatorio.";
      } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $errors[] = "El nombre solo puede contener letras y espacios.";
      }

      // Validar los apellidos
      if (empty($apellidos)) {
        $errors[] = "Los apellidos son obligatorios.";
      } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellidos)) {
        $errors[] = "Los apellidos solo pueden contener letras y espacios.";
      }

      // Validar el celular
      if (empty($celular)) {
        $errors[] = "El número de celular es obligatorio.";
      } elseif (!preg_match("/^[0-9]{10}$/", $celular)) { // Ajusta la longitud según sea necesario
        $errors[] = "El número de celular debe tener 10 dígitos.";
      }

      // Validar el email
      if (empty($email)) {
        $errors[] = "El email es obligatorio.";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del email es inválido.";
      }

      // Validar la contraseña
      if (empty($psw)) {
        $errors[] = "La contraseña es obligatoria.";
      } elseif (strlen($psw) < 8) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres.";
      }



      if (empty($errors)) {
        $id_rol = 2;
        // Si no hay errores, procesar los datos (por ejemplo, guardarlos en la base de datos)
        $sql = $cnnPDO->prepare("INSERT INTO Info_User (nombre, apellidos, celular,email, psw, id_rol) VALUES (:nombre,:apellidos,:celular,:email, :psw, :id_rol)");
        $sql->bindParam(':id_rol', $id_rol);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apellidos', $apellidos);
        $sql->bindParam(':celular', $celular);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':psw', $psw);
        $sql->execute();

        unset($sql);
        unset($cnnPDO);
        header("location:login.php");
      } else {
        // Mostrar errores
        foreach ($errors as $error) {
          echo "<p>$error</p>";
        }
      }
    } else {
      // La respuesta de reCAPTCHA no es válida, muestra un mensaje de error
      echo "Por favor, completa el reCAPTCHA.";
    }
  } else {
    // No se proporcionó la respuesta de reCAPTCHA, muestra un mensaje de error
    echo "Por favor, completa el reCAPTCHA.";
  }
}
