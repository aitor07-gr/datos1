<?php
session_start();
include('lib.php');
$conexion = conectarse();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(*) AS total FROM departamentos WHERE user_id = $user_id";
$consulta = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_assoc($consulta);

$departamentos = $datos['total'];
?>

<!DOCTYPE html>
<html>
<body>

<h1>Bienvenido, <?php echo $_SESSION['user']; ?></h1>

<p>Tienes asignados <strong><?php echo $departamentos; ?></strong> departamentos.</p>

</body>
</html>

