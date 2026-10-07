<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

$sql = 'SELECT * FROM users WHERE user="'. $_POST['usuario'] .'" AND password="'. $_POST['clave'] .'"';
$consulta = mysqli_query($conexion,$sql);

if(mysqli_num_rows($consulta) > 0){
    // Identificación correcta
    $_SESSION['usuario'] = $_POST['usuario'];

    $reg = mysqli_fetch_array($consulta);

    $ahora = date('Y-m-d H:i:s');

    $sqlAcceso = 'INSERT INTO accesos (user_id,fechahora) VALUES('.$reg['id'].',"'.$ahora.'");';
    mysqli_query($conexion,$sqlAcceso);

    header('Location: portada.php');
}else{
    // Identificación incorrecta
    header('Location: index.php');
}
?>