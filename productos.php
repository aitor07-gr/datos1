<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

if(isset($_GET['idborra'])){
    if($_GET['idborra']>0){
        $sqlborra = 'DELETE FROM productos WHERE id = '.$_GET['idborra'].';';
        mysqli_query($conexion,$sqlborra);
        header('Location: productos.php');
    }
}


$sql = 'SELECT * FROM productos;';

$consulta = mysqli_query($conexion,$sql);

$resultado = '';

while($r = mysqli_fetch_array($consulta)){
    $resultado.= '<tr>';
        $resultado.= '<td>'.$r['id'].'</td>';
        $resultado.= '<td>'.$r['producto'].'</td>';
        $resultado.= '<td>'.$r['precio'].'</td>';
        $resultado.= '<td>'.$r['stock'].'</td>';
        $resultado.= '<td><img src="img/'.$r['foto'].'" width="150" alt="'.$r['producto'].'"></td>';
        $resultado.= '<td><a href="productos.php?idborra='.$r['id'].'">Borrar</a></td>';
        $resultado.= '<td><a href="productos_edit.php?idproducto='.$r['id'].'">Editar</a></td>';
        $resultado.= '<td><a href="productos_detalle.php?idproducto='.$r['id'].'">Detalle</a></td>';
    $resultado.= '</tr>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Foto</th>
            <th>-</th>
        </tr>

        <?php echo $resultado ?>

    </table>
</body>
</html>