<?php
include("config.php");

function conectarse() {
    global $servidor, $usuarioservidor, $claveservidor, $bbdd, $puerto;
    return mysqli_connect($servidor, $usuarioservidor, $claveservidor, $bbdd, $puerto);
}
?>

