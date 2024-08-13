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
        require 'config.php';

        // Recuperar datos del formulario
        $celular = trim($_POST['celular']);
        $psw = trim($_POST['psw']);

        // Validar la contraseña
        if (empty($psw)) {
            echo 'La contraseña es obligatoria.';
        } elseif (strlen($psw) < 8) {
            echo 'La contraseña debe tener al menos 8 caracteres.';
        } else {
            $sql = $cnnPDO->prepare('SELECT * FROM info_user WHERE (celular=:celular OR email=:celular)');
            $sql->bindParam(':celular', $celular);
            $sql->execute();

            $user = $sql->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verificar la contraseña encriptada
                if (password_verify($psw, $user['psw'])) {
                    // Verificar y gestionar las sesiones activas
                    $userId = $user['id_infouser'];
                    $sessionId = session_id();

                    // Verificar si ya existe una sesión activa para este usuario
                    $sqlSessionCheck = "SELECT * FROM active_sessions WHERE user_id=:user_id";
                    $stmtSessionCheck = $cnnPDO->prepare($sqlSessionCheck);
                    $stmtSessionCheck->bindParam(':user_id', $userId);
                    $stmtSessionCheck->execute();
                    $activeSessions = $stmtSessionCheck->rowCount();


                    //Ciclo para el limite de sesiones activas, solo pueden ser una, si detecta otro no deja ingresar
                    if ($activeSessions >= 1) {
                        echo "Límite de sesiones activas alcanzado. Cierra sesión en otro dispositivo antes de iniciar sesión aquí.";
                    } else {
                        // Si no hay problema con las sesiones activas, iniciar sesión
                        $_SESSION['id'] = $user['id_infouser'];
                        $_SESSION['celular'] = $user['celular'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['nombre'] = $user['nombre'];
                        $_SESSION['apellidos'] = $user['apellidos'];
                        $_SESSION['id_rol'] = $user['id_rol'];

                        // Insertar la sesión activa en la base de datos
                        $insertSessionSql = "INSERT INTO active_sessions (user_id, session_id) VALUES (:user_id, :session_id)";
                        $stmtInsertSession = $cnnPDO->prepare($insertSessionSql);
                        $stmtInsertSession->bindParam(':user_id', $userId);
                        $stmtInsertSession->bindParam(':session_id', $sessionId);
                        $stmtInsertSession->execute();

                        // Redirigir según el rol del usuario
                        if ($_SESSION['id_rol'] == 1) {
                            header("location:vistas/administrador/index.php");
                            exit();
                        } else {
                            header("location:vistas/usuarios/index.php");
                            exit();
                        }
                    }
                } else {
                    echo 'Credenciales incorrectas.';
                }
            } else {
                echo 'Credenciales incorrectas.';
            }
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
