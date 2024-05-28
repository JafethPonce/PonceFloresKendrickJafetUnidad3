<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM usuarios';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['nombre']; ?></td>
	    		<td><?php echo $row['apellidos']; ?></td>
	    		<td><?php echo $row['celular']; ?></td>
	    		<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['psw']; ?></td>
	    		<td>
	    			<button class="btn btn-success btn-sm edit" data-id="<?php echo $row['nombre']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button>
	    			<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['nombre']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>