<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sh3";

$conn = new mysqli($host, $username, $password, $database);
if(!$conn){
    echo "Error, no se pudo conectar con la BD".$conn->error;
    exit;
}
?>