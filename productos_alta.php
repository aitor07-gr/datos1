<?php
include('lib.php');

// Esta página tiene dos usos: 
//  1: ejecutar el INSERT del producto que llega desde el formulario
//  2: mostrar el formulario para dar de alta el nuevo producto
// Se ejecuta una u otra: si se recibe por método POST datos del formulario, es que hay que ejecutar el INSERT. Pero, si no se recibe nada por POST, lo que s ehace es mostrar el formulario. 
if(!empty($_POST['producto'])){ // Si no está vacío el campo "producto".....
    // Código para insertar los datos recibidos desde el formulario de esta misma página.
    $conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

    $sql = 'INSERT INTO productos (producto,precio,stock,foto) VALUES("'.$_POST['producto'].'","'.$_POST['precio'].'","'.$_POST['stock'].'","'.$_POST['foto'].'");';

    mysqli_query($conexion,$sql);

    $idnuevo = mysqli_insert_id($conexion);
    
    header('Location: productos_detalle.php?idproducto='.$idnuevo);
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
    
<form name="formu" id="formu" action="productos_alta.php" method="POST">
    <div>
        <label for="producto">Producto:</label>
        <input type="text" name="producto" id="producto">
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio">
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock">
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="text" name="foto" id="foto">
    </div>
    <div>
        <input type="submit" value="ENVIAR">
    </div>
</form>

</body>
</html>