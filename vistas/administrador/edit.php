<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];

		$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', celular = '$celular', email = '$email', psw = '$psw' WHERE nombre = '$nombre'";
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
			$output['message'] = 'Miembro actualziado correctamente';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al actualizar. No se pudo actualizar';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);
	
?>