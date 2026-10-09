<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);
if(isset($_GET['idproducto'])){
    if(!$_GET['idproducto']>0){
        header('Location: productos.php');
    }
}


if(!empty($_POST['producto'])){ // Si se recibe un valor a través del método POST para el campo "producto"....
    // Preparamos la instrucción SQL para actualizar los datos con UPDATE, insertando los valores que nos han llegado desde el formulario a través de POST.
    $sqlUpdate = 'UPDATE productos SET producto="'.$_POST['producto'].'", precio='.$_POST['precio'].', stock='.$_POST['stock'].', foto="'.$_POST['foto'].'" WHERE id='.$_GET['idproducto'].';';

    mysqli_query($conexion,$sqlUpdate); // Ejecutamos la instrucción almacenada en la variable $sqlUpdate

}


$sql = 'SELECT * FROM productos WHERE id='.$_GET['idproducto'].';';

$consulta = mysqli_query($conexion,$sql);

if(mysqli_num_rows($consulta) > 0){ 
    $r = mysqli_fetch_array($consulta);
}else{
    header('Location: productos.php');
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
    
<form name="formu" id="formu" action="productos_edit.php?idproducto=<?php echo $_GET['idproducto']?>" method="POST">
    <div>
        <label for="producto">Producto:</label>
        <input type="text" name="producto" id="producto" value="<?php echo $r['producto'] ?>">
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="<?php echo $r['precio'] ?>">
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?php echo $r['stock'] ?>">
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="text" name="foto" id="foto" value="<?php echo $r['foto'] ?>">
    </div>
    <div>
        <input type="submit" value="ENVIAR">
    </div>
</form>

</body>
</html>