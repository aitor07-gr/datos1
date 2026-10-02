<?php
include('lib.php');

$conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $bbdd, $puerto);

$sql = 'SELECT producto, precio, stock FROM productos;';

$consulta = mysqli_query($conexion, $sql);

$resultado = '';
$resultado .= '<table>';
$resultado .= '<tr>';
$resultado .= '<th>producto</th>';
$resultado .= '<th>precio</th>';
$resultado .= '<th>IVA</th>';
$resultado .= '<th>PVP</th>';
$resultado .= '<th>stock</th>';
$resultado .= '</tr>';

while($reg = mysqli_fetch_array($consulta)){
    $precio = $reg['precio'];
    $iva = $precio * 0.21;
    $pvp = $precio + $iva;

    $resultado .= '<tr>';
    $resultado .= '<td>'.$reg['producto'].'</td>';
    $resultado .= '<td>'.$precio.'</td>';
    $resultado .= '<td>'.$iva.'</td>';
    $resultado .= '<td>'.$pvp.'</td>';
    $resultado .= '<td>'.$reg['stock'].'</td>';
    $resultado .= '</tr>';
}

$resultado .= '</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php echo $resultado; ?>
</body>
</html>