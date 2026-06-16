<?php
require_once 'conexion.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$ciudad = mysqli_real_escape_string($link, trim($_POST['ciudad'] ?? ''));
$pais = mysqli_real_escape_string($link, trim($_POST['pais'] ?? ''));
$habitantes = (int) ($_POST['habitantes'] ?? 0);
$superficie = (float) ($_POST['superficie'] ?? 0);
$tieneMetro = isset($_POST['tieneMetro']) ? (int) $_POST['tieneMetro'] : 0;

if ($id > 0) {
    $sql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
} else {
    $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
}

if (!mysqli_query($link, $sql)) {
    die('Error al guardar: ' . mysqli_error($link));
}

header('Location: listado.php');
exit;
?>