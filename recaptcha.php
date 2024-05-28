<?php
session_start();

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = "6LfiKOkpAAAAAHrbo9O2MYrwFfgvcODWAEP-1sK_";

    // Enviar la solicitud POST al servidor de reCAPTCHA
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha);
    $responseKeys = json_decode($response, true);

    // Verificar la respuesta del servidor de reCAPTCHA
    if ($responseKeys["success"]) {
        require 'conexion.php';

        // Recuperar datos del formulario
        $celular = trim($_POST['celular']);
        $psw = trim($_POST['psw']);

        // Inicializar un array para almacenar los errores
        $errors = [];

        // Validar el celular
        // if (empty($celular)) {
        //   $errors[] = "El número de celular es obligatorio.";
        // } elseif (!preg_match("/^[0-9]{10}$/", $celular)) { // Ajusta la longitud según sea necesario
        //   $errors[] = "El número de celular debe tener 10 dígitos.";
        // }

        // Validar la contraseña
        if (empty($psw)) {
            $errors[] = "La contraseña es obligatoria.";
        } elseif (strlen($psw) < 8) {
            $errors[] = "La contraseña debe tener al menos 8 caracteres.";
        }

        if (empty($errors)) {

            $sql = $cnnPDO->prepare('SELECT * from info_user WHERE (celular=:celular || email=:celular) AND psw=:psw ');


            $sql->bindParam(':celular', $celular);
            $sql->bindParam(':psw', $psw);
            $sql->execute();

            $count = $sql->rowCount();
            $campo = $sql->fetch();

            if ($count) {
                $_SESSION['id'] = $campo['id_infouser'];
                $_SESSION['celular'] = $campo['celular'];
                $_SESSION['email'] = $campo['email'];
                $_SESSION['nombre'] = $campo['nombre'];
                $_SESSION['apellidos'] = $campo['apellidos'];
                $_SESSION['psw'] = $campo['psw'];
                header("location:vistas/usuarios/index.php");
            } else {
                echo 'Contraseña incorrecta';
            }
        } else {
            echo 'Credenciales incorrectas';
        }
    } else {
        // El reCAPTCHA no fue validado
        echo "Error: Por favor, completa el reCAPTCHA.";
    }
} else {
    // El reCAPTCHA no fue enviado
    echo "Error: Por favor, completa el reCAPTCHA.";
}

ob_end_flush();
?>