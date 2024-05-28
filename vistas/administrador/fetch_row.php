<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();

	try{
		$nombre = $_POST['nombre'];
		$stmt = $db->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
		$stmt->bindParam(':nombre', $nombre);
		$stmt->execute();
		$output['data'] = $stmt->fetch();
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);

?>