<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito de compras</h1>
    <p><a href="catalogo.php">Volver al catálogo</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>
        <?php foreach ($carrito as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['producto']); ?></td>
            <td><?php echo $item['precio']; ?></td>
        </tr>
        <?php $total += (float) $item['precio']; endforeach; ?>
    </table>

    <h2>Total: <?php echo number_format($total, 2, ',', '.'); ?></h2>
</body>
</html>