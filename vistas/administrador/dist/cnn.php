<!DOCTYPE html>
<html>
<head>
	<title>LongBlob</title>
	<meta charset="utf-8">
	<link rel="icon" href="images/php-icono.png">
</head>
<body>

	
	<?php
	/* Definir las variables para la conexion al PDO */
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'db_longblob');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');

	try {
		/* Conectar a una base de datos de MySQL Local */
		$cnnPDO = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {

		echo "
	
		<div style='width:35%;margin:0 auto; margin-top:50px;'>
			<div class='card border border-danger shadow-0 mb-3' style='max-width: 35rem;'>
				<div class='card-header text-white bg-danger border-danger text-center'><h3>Error de Conexión</h3>
				</div>
				<div class='card-body text-secondary px-lg-5 '>
					<h4 class='card-title text-center'>Ha surgido un error y no se puede conectar a la base de datos!
						<br><br>Verifique el nombre de su 
						<br>| base de datos |<br>
					</h4>
					<p class='card-text text-danger'>". $e->getMessage()."</p>
				</div>
			<div class='card-footer text-white bg-danger border-danger text-center'><h5>-PHP-Cadena de Conexión</h5>
		</div>

		";
	}

	?>

</body>
</html>
