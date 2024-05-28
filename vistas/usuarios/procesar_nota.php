<?php
include_once "conexiondb.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $nota = $_POST['Nota'];
    $fecha = date('Y-m-d');  // Obtener la fecha actual del sistema

    $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

    if (!$conexion) {
        echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos']);
        exit;
    }

    $sql = "INSERT INTO notas (Nombre, Nota, Fecha) VALUES ('$nombre', '$nota', '$fecha')";
    if (mysqli_query($conexion, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Nota agregada correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar la nota']);
    }

    mysqli_close($conexion);
}
?>
