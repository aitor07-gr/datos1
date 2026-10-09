<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

if(isset($_GET['idborra'])){
    if($_GET['idborra']>0){
        $sqlborra = "DELETE FROM proveedores WHERE id = ".$_GET['idborra'].";";
        mysqli_query($conexion,$sqlborra);
        header('Location: proveedores.php');
    }
}

$sql = 'SELECT * FROM proveedores;';

$consulta = mysqli_query($conexion,$sql);

$resultado = '';

while($r = mysqli_fetch_array($consulta)){
    $resultado.= '<tr>';
    $resultado.= '<td>'.$r['id'].'</td>';
    $resultado.= '<td>'.$r['empresa'].'</td>';
    $resultado.= '<td>'.$r['cif'].'</td>';
    $resultado.= '<td>'.$r['telefono'].'</td>';
    $resultado.= '<td><a href="proveedores.php?idborra='.$r['id'].'">Borrar</a></td>';
    $resultado.= '<td><a href="proveedores_edit.php?idproveedor='.$r['id'].'">Editar</a></td>';
    $resultado.= '<td><a href="proveedor_detalle.php?idproveedor='.$r['id'].'">Detalle</a></td>';
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
            <th>Empresa</th>
            <th>Cif</th>
            <th>Telefono</th>
            <th>-</th>
            <th>-</th>
            <th>-</th>
        </tr>
        <?php echo $resultado ?>
    </table>
</body>
</html>