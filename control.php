<?php
include('lib.php');

// Ejecutamos la función "conectarse" para crear una conexión a la base de datos
// y asignamos esa conexión a la variable "$conexion" para poder usarla
$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);


$sql = 'SELECT * FROM users WHERE user="'.$_POST['usuario'].'" AND password="'.$_POST['clave'].'";';

$consulta = mysqli_query($conexion,$sql);

if(mysqli_num_rows($consulta) > 0){   
    // Identificación correcta
    $_SESSION['usuario'] = $_POST['usuario'];

    $reg = mysqli_fetch_array($consulta);

    $ahora = date('Y-m-d h:i:s');

    $sqlAcceso = 'INSERT INTO accesos (user_id,fechahora) VALUES('.$reg['id'].',"'.$ahora.'");';
    mysqli_query($conexion,$sqlAcceso);
    
    header('Location: portada.php');
}else{
    // Identificación incorrecta
    header('Location: index.php');
}
?>