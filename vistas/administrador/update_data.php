<?php 
require_once('connect.php');
extract($_POST);

$update = $conn->query("UPDATE `usuarios` set `nombre` = '{$nombre}', `apellidos` = '{$apellidos}', `celular` = '{$celular}',`email` = '{$email}' where nombre = '{$id}'");
if($update){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);