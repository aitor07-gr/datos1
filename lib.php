<?php
session_start();
include('config.php');
// Función para conectarse a la base de datos.
function conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto){
	if(!$conexion = mysqli_connect($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto)){
		echo "Algo no va bien con la base de datos";	
		exit;
	}
	return $conexion;
}