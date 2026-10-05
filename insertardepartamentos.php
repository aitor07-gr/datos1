<?php
include('lib.php');
$conexion = conectarse();

$sql = "INSERT INTO departamentos (departamento, user_id, user) VALUES 
('marketing', 1, 'usuario1'),
('contabilidad', 2, 'usuario2'),
('diseño', 1, 'usuario1'),
('seo', 1, 'usuario1'),
('administración', 3, 'usuario3')";

mysqli_query($conexion, $sql);

echo "Datos insertados correctamente";
?>