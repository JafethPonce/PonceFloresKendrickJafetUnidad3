<?php
// Configuración de la base de datos
$db_host = 'localhost';  // Cambia esto si tu base de datos no está en el mismo servidor
$db_user = 'root'; // Cambia esto al nombre de usuario de tu base de datos
$db_pass = ''; // Cambia esto a la contraseña de tu base de datos
$db_database = 'blog';
// Crear conexión
$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
