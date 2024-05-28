<?php
require_once 'conexion.php';


if (isset($_POST['contacto'])) {
  // Recuperar datos del formulario
  $nombres = trim($_POST['nombres']);
  $email = trim($_POST['email']);
  $asunto = trim($_POST['asunto']);
  $mensaje = trim($_POST['mensaje']);

  // Inicializar un array para almacenar los errores
  $errors = [];

  // Validar los nombres
  if (empty($nombres)) {
    $errors[] = "Los nombres son obligatorios.";
  } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombres)) {
    $errors[] = "Los nombres solo pueden contener letras y espacios.";
  }

  // Validar el email
  if (empty($email)) {
    $errors[] = "El email es obligatorio.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "El formato del email es inválido.";
  }

  // Validar el asunto
  if (empty($asunto)) {
    $errors[] = "El asunto es obligatorio.";
  } elseif (strlen($asunto) > 100) {
    $errors[] = "El asunto no puede exceder los 100 caracteres.";
  }

  // Validar el mensaje
  if (empty($mensaje)) {
    $errors[] = "El mensaje es obligatorio.";
  } elseif (strlen($mensaje) > 500) {
    $errors[] = "El mensaje no puede exceder los 500 caracteres.";
  }



  if (empty($errors)) {
    // Si no hay errores, procesar los datos (por ejemplo, guardarlos en la base de datos)
    $sql = $cnnPDO->prepare("INSERT INTO contacto (nombres,email, asunto, mensaje) VALUES (:nombres,:email,:asunto,:mensaje)");

    $sql->bindParam(':nombres', $nombres);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':asunto', $asunto);
    $sql->bindParam(':mensaje', $mensaje);
    $sql->execute();

    unset($sql);
    unset($cnnPDO);
    header("location:index.php");
  } else {
    // Mostrar errores
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  }
}
