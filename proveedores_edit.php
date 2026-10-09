<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);
if(isset($_GET['idproveedor'])){
    if(!$_GET['idproveedor']>0){
        header('Location: proveedores.php');
    }
}

if(!empty($_POST['empresa'])){
    $sqlUpdate = 'UPDATE proveedores SET empresa="'.$_POST['empresa'].'", cif="'.$_POST['cif'].'", telefono="'.$_POST['telefono'].'" WHERE id='.$_GET['idproveedor'].';';
    
    mysqli_query($conexion,$sqlUpdate); 
}

$sql = 'SELECT * FROM proveedores WHERE id='.$_GET['idproveedor'].';';
$consulta = mysqli_query($conexion,$sql);
if(mysqli_num_rows($consulta) > 0){
    $r = mysqli_fetch_array($consulta);
}else{
    header('Location: proveedores.php');
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

<form name="formu" id="formu" action="proveedores_edit.php?idproveedor=<?php echo $_GET['idproveedor'] ?>" method="POST">
    <div>
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa" id="empresa" value="<?php echo $r['empresa'] ?>">
    </div>
    <div>
        <label for="cif">Cif:</label>
        <input type="text" name="cif" id="cif" value="<?php echo $r['cif'] ?>">
    </div>
    <div>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $r['telefono'] ?>">
    </div>
    <div>
        <input type="submit" value="ENVIAR">
    </div>
</form>

</body>
</html>