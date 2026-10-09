<?php
include('lib.php');

if(!empty($_POST['empresa'])){
    $conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

    $sql = 'INSERT INTO proveedores (empresa,cif,telefono) VALUES("'.$_POST['empresa'].'","'.$_POST['cif'].'","'.$_POST['telefono'].'");';

    mysqli_query($conexion,$sql);

    $idnuevo = mysqli_insert_id($conexion);

    header('Location: proveedor_detalle.php?idproveedor='.$idnuevo);
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

<form name="formu" id="formu" action="proveedores_alta.php" method="POST">
    <div>
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa" id="empresa">
    </div>
    <div>
        <label for="cif">Cif:</label>
        <input type="text" name="cif" id="cif">
    </div>
    <div>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono">
    </div>
    <div>
        <input type="submit" value="ENVIAR">
    </div>
</form>

</body>
</html>