<?php
session_start();
include('lib.php');
$conexion = conectarse();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM users WHERE user='$usuario' AND password='$clave'";
$consulta = mysqli_query($conexion, $sql);

if(mysqli_num_rows($consulta) > 0){
    $datos = mysqli_fetch_assoc($consulta);
    $_SESSION['user_id'] = $datos['id'];
    $_SESSION['user'] = $datos['user'];

    $id_usuario = $datos['id'];
    $sql_acceso = "INSERT INTO accesos (user_id, fechahora) VALUES ($id_usuario, NOW())";
    mysqli_query($conexion, $sql_acceso);

    header('Location: portada.php');
} else {
    header('Location: index.php');
}
?>