<?php

include('lib.php');
 
$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);
 
$sql = 'SELECT * FROM departamentos;';
 
$consulta = mysqli_query($conexion,$sql);
 
$resultado = '';
$resultado .= '<table>';
$resultado .= '<tr>';
    $resultado .= '<th>id</th>';
    $resultado .= '<th>departamento</th>';
    $resultado .= '<th>Id usuario</th>';
    $resultado .= '<th>Usuario</th>';
$resultado .= '</tr>';

while($reg = mysqli_fetch_array($consulta)){
    $resultado .= '<tr>';
        $resultado .= '<td>'.$reg['id'].'</td>';
        $resultado .= '<td>'.$reg['departamento'].'</td>';
        $resultado .= '<td>'.$reg['user_id'].'</td>';
        $resultado .= '<td>'.$reg['user'].'</td>';
    $resultado .= '</tr>';
}
 
$resultado.= '</table>';
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php echo $resultado; ?>
</body>
</html>
 