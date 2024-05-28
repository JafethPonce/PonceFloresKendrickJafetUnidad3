<?php
require_once '../../conexion.php';

if (isset($_POST['actualizar'])) 
{  
  
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $email=$_POST['email'];
    $celular=$_POST['celular'];
    $psw=$_POST['psw'];

    $sql = $cnnPDO->prepare(
        'UPDATE info_user SET nombre = :nombre, apellidos = :apellidos, email= :email, celular =:celular, psw =:psw WHERE email = :email'
    );
        
    $sql->bindParam(':nombre',$nombre);
    $sql->bindParam(':apellidos',$apellidos);
    $sql->bindParam(':email',$email);
    $sql->bindParam(':celular',$celular);
    $sql->bindParam(':psw',$psw);

    $sql->execute();
    unset($sql);
    unset($cnnPDO);

    header("location:logout.php");
}
?>