<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

if(isset($_GET['idproveedor'])){
    if(!$_GET['idproveedor']>0){
        header('Location: proveedores.php');
    }
}

$idp = $_GET['idproveedor']; 

$sql = "SELECT * FROM proveedores WHERE id = $idp;"; 
$consulta = mysqli_query($conexion,$sql);
$r = mysqli_fetch_array($consulta); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $r['empresa'] ?></h1>

    <table>
        <tr>
            <th>Cif:</th>
            <td><?php echo $r['cif'] ?></td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td><?php echo $r['telefono'] ?></td>
        </tr>
    </table>
</body>
</html>