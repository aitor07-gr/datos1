<?php
include('lib.php');
$conexion = conectarse();

$sql = "INSERT INTO departamentos (departamento, user_id) VALUES
('marketing', 1),
('contabilidad', 2),
('diseño', 1),
('seo', 1),
('administración', 3)";

mysqli_query($conexion, $sql);

echo "Datos insertados correctamente";
?>
