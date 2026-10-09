<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

$sql = 'SELECT * FROM departamentos WHERE user="'.$_SESSION['usuario'].'";';

$consulta = mysqli_query($conexion,$sql);

echo mysqli_num_rows($consulta);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

