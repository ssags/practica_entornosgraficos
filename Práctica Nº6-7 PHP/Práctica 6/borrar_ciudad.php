<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM ciudades WHERE id = $id";

    if (!mysqli_query($link, $sql)) {
        die('Error al borrar: ' . mysqli_error($link));
    }
}

header('Location: listado.php');
exit;
?>