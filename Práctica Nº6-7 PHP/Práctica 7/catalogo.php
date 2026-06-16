<?php
session_start();
require_once 'conexion_compras.php';

$resultado = mysqli_query($link, 'SELECT * FROM catalogo ORDER BY id');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
</head>
<body>
    <h1>Catálogo de productos</h1>
    <p><a href="ver_carrito.php">Ver carrito</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo htmlspecialchars($fila['producto']); ?></td>
            <td><?php echo $fila['precio']; ?></td>
            <td><a href="agregar_carrito.php?id=<?php echo $fila['id']; ?>">Agregar</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>