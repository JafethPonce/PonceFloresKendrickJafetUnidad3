<?php
ob_start(); 
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Cerrar sesión</title>
 	<style>
 		*
 		{
 			text-align: center;
 		}
 	</style>
 </head>
 <body>
 <?php
 session_start();
 session_destroy();
 header("location:../../../loginAdmin.php");
 ?>
 </body>
 </html>