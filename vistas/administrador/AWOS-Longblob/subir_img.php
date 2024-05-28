<?php 
require_once 'cnn.php';
?>

<?php
session_start();
?>

<?php
if(isset($_POST["guardar"]))
{
    $codigo = $_POST['codigo'];
    $size = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($size !== false)
    {
        $cargarImagen = $_FILES['imagen']['tmp_name'];
        $imagen = fopen($cargarImagen,'rb');

       // $imgContent = addslashes(file_get_contents($imagen));     
        $dataTime = date("Y-m-d H:i:s");

        $sql=$cnnPDO->prepare("INSERT INTO tabla_imagenes
            (codigo, imagen, creado) VALUES (:codigo, :imagen, :creado)");

        //Asignar el contenido de las variables a los parametros
        $sql->bindParam(':codigo',$codigo);
        $sql->bindParam(':imagen',$imagen, PDO::PARAM_LOB);
        $sql->bindParam(':creado',$dataTime);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);   
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagina Admin - Style Clothing</title>
    <meta charset="utf-8">
</head>
<body>
    <center>
        <a href="../dist/index.php"><img src="../../../assets/img/s11.png"></a>
    </center>
    
    <hr>
    <a href="eliminar_img.php">Eliminar Imagenes</a> |
    <a href="../dist/index.php">Regresar</a>
    <hr><br>
    <div style="width:75%;margin:0 auto; margin-top:30px;">
    <form  method="post" enctype="multipart/form-data" style="border:10">
        <h1>Ingresar promocionales:</h1>
        Código de la Imagen :
        <input type="text" name="codigo"> <br><br>
         
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-cloud-upload-alt"></i> </span>
          </div>
          <div class="custom-file">
            <input type="file" accept="image/jpg" name="imagen" class="custom-file-input"  id="image"
            aria-describedby="inputGroupFileAddon01" lang="es">
            <label class="custom-file-label" for="image">Selecciona una imagen (.jpg)</label>
          </div>
        </div><br>
        
        <input type="submit" name="guardar" value="Guardar Imagen"/>
    </form>
</div>
</body>
</html>