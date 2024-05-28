<?php 
require_once('connect.php');
extract($_POST);

$update = $conn->query("UPDATE `productos` set `descripcion` = '{$descripcion}', `costo` = '{$costo}', `stock` = '{$stock}',`codigo` = '{$codigo}' where id = '{$id}'");
if($update){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);