<?php
$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = '';

try {
    $cnnPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $cnnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>
