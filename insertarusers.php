<?php
include('lib.php');
$conexion = conectarse();

$sql = "INSERT INTO users (user, password) VALUES ('pepito', '1234')";
mysqli_query($conexion, $sql);

echo "Usuario insertado correctamente";
?>
