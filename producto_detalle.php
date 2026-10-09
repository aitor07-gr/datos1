<?php
include('lib.php');

$conexion = conectarse($servidor,$usuarioservidor,$claveservidor,$bbdd,$puerto);

if(isset($_GET['idproducto'])){
    if(!$_GET['idproducto']>0){
        header('Location: productos.php');
    }
}

$idp = $_GET['idproducto']; // Se crea la variable  idp por comodidad, para usarla en lugar de $_GET['idproducto'] (esto es opcional, es pura vagancia)

$sql = "SELECT * FROM productos WHERE id = $idp;"; // Si la variable es simple (no un array), podemos olvidarnos de cortar el string e insertar directamente la variable si encerramos el string con comillas dobles, en vez de comillas simples.
$consulta = mysqli_query($conexion,$sql);
$r = mysqli_fetch_array($consulta); // El único registro que tendrá la consulta lo almacenamos en forma de array en la variable $r




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $r['producto'] ?></h1>    

    <table>
        <tr>
            <th>Precio:</th>
            <td><?php echo $r['precio'] ?></td>
        </tr>
        <tr>
            <th>Stock:</th>
            <td><?php echo $r['stock'] ?></td>
        </tr>
        <tr>
            <th>Foto:</th>
            <td><img src="img/<?php echo $r['foto'] ?>" width="300" alt="<?php echo $r['producto'] ?>"></td>
        </tr>

    </table>

</body>
</html>