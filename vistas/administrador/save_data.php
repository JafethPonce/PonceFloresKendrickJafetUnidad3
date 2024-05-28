<?php 
require_once('connect.php');
extract($_POST);

$query = $conn->query("INSERT INTO `productos` (`descripcion`,`costo`,`stock`,`codigo`) VALUE ('{$descripcion}','{$costo}','{$stock}','{$codigo}')");
if($query){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);