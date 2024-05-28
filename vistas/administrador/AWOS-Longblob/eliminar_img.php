<!-- Conexion a la D-B -->
<?php 
    require_once 'cnn.php';
?>

<?php 
    $count=0;
?>

<!-- Funcion-ELIMINAR-BACKEND -->
<?php
if (isset($_POST['eliminar'])) {
  
  $codigo=$_POST['codigo'];

   if (!empty($codigo)){
    $query = $cnnPDO->prepare('DELETE FROM tabla_imagenes WHERE codigo=:codigo');
    $query->bindParam(':codigo', $codigo);
    
    if($query->execute()){
      echo '<script>
      alert ("La imagen que seleccionaste se ah borrado correctamente!!!");
      window.location = "mostrar_img.php";
      </script>';
      }else{
      echo '<script>
      alert ("Parece que hubo un error!!!");
      window.location = "eliminar_img.php";
      </script>';
      }    
  }   
}
?>

<!-- Funcion-SELECCION-BACKEND -->
<?php
    require_once 'cnn.php';
    $sql = "SELECT * FROM tabla_imagenes";
    $stmt = $cnnPDO->prepare($sql);
    $stmt->execute();
?>

<!-- Funcion-BUSCAR-BACKEND -->
<?php
if (isset($_POST['buscar'])) {
  
  $codigo=$_POST['codigo'];

  $query = $cnnPDO->prepare('SELECT * FROM tabla_imagenes WHERE codigo=:codigo');

  $query->bindParam(':codigo', $codigo);

  $_SESSION['codigo']= $codigo;
  
  $query->execute(); 
  $count=$query->rowCount();
  $campo = $query->fetch();

  unset ($sql);
}
?>

<!-- Estructura-HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LongBlob</title>
  <meta charset="utf-8">
  <link rel="icon" href="images/php-icono.png">
</head>
  <body>
    <center>
    <a href="../dist/index.php"><img src="../../../assets/img/s11.png"></a>

  </center>
 <hr><br>
 	    <div style="width:75%;margin:0 auto; margin-top:30px;">
    <form  method="post" enctype="multipart/form-data">
        Consultar una imagen! 
        <input type="text" name="codigo" placeholder="Codigo de tu imagen!"><button type="submit" name="buscar" class="btn btn-danger">Buscar</button>

<!-- Funcion-MOSTRAR-BACKEND -->      
<?php 
     if ($count) {
      echo '<tr>';
      echo '<td>' . $campo['codigo'] . '</td>';
      echo ' ';
      echo ' ';
      echo ' ';
      echo '<td>' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['imagen']) . '" width = "200px" height = "200px"/>' . '</td>';
      echo '<td>' . $campo['creado'] . '</td>';
      echo '</tr>';
    }
?>

<input type="submit" name="eliminar" value="Borrar imagen"/>  
    </form>
</div>
</body>
</html>