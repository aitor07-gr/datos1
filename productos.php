<?php
include('lib.php');

$conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $bbdd, $puerto);

if (isset($_GET['idborra'])) {
    if ($_GET['idborra'] > 0) {
        $borrasql = 'DELETE FROM productos WHERE id = ' . $_GET['idborra'];
        mysqli_query($conexion, $borrasql);
    }
}

$sql = 'SELECT id, producto, precio, stock FROM productos;';
$consulta = mysqli_query($conexion, $sql);

$resultado = '';
$resultado .= '<table>';
$resultado .= '<tr>';
$resultado .= '<th>producto</th>';
$resultado .= '<th>precio</th>';
$resultado .= '<th>IVA</th>';
$resultado .= '<th>PVP</th>';
$resultado .= '<th>stock</th>';
$resultado .= '<th>Acción</th>';
$resultado .= '</tr>';

while($reg = mysqli_fetch_array($consulta)){
    $precio = $reg['precio'];
    $iva = $precio * 0.21;
    $pvp = $precio + $iva;

    $resultado .= '<tr>';
    $resultado .= '<td><a href="producto_detalle.php?idproducto='.$reg['id'].'">'.$reg['producto'].'</a></td>';
    $resultado .= '<td>'.$precio.'</td>';
    $resultado .= '<td>'.$iva.'</td>';
    $resultado .= '<td>'.$pvp.'</td>';
    $resultado .= '<td>'.$reg['stock'].'</td>';
    $resultado .= '<td><a href="productos.php?idborra='.$reg['id'].'"><img src="img/papelera.png" width="20" height="20"></a></td>';
    $resultado .= '</tr>';
}

$resultado .= '</table>';
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