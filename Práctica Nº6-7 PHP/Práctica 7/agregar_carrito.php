<?php
session_start();
require_once 'conexion_compras.php';

$id = (int) ($_GET['id'] ?? 0);

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$sql = "SELECT * FROM catalogo WHERE id = $id LIMIT 1";
$resultado = mysqli_query($link, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $producto = mysqli_fetch_assoc($resultado);
    $_SESSION['carrito'][] = $producto;
}

mysqli_close($link);
header('Location: ver_carrito.php');
exit;
?>