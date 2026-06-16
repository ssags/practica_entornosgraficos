# Práctica 7 - Ejercicio 7

## Consigna

Confeccionar un carrito de compras simple, usando base de datos. Se debe crear una base de datos con el nombre `Compras`. En dicha base crear una tabla llamada `catálogo` con los siguientes atributos: `id`, `producto` del tipo varchar de 100, `precio` del tipo numérico decimal de 9 entero y 2 decimales.

## Solución propuesta

La aplicación muestra un catálogo de productos y permite agregar artículos al carrito usando sesiones. El catálogo se almacena en la base de datos `Compras`.

### Estructura SQL

```sql
CREATE DATABASE Compras;
USE Compras;

CREATE TABLE catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9,2) NOT NULL
);
```

### `conexion.php`

```php
<?php
$link = mysqli_connect('localhost', 'root', '', 'Compras');

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_set_charset($link, 'utf8');
?>
```

### `catalogo.php`

```php
<?php
session_start();
require_once 'conexion.php';

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
```

### `agregar_carrito.php`

```php
<?php
session_start();
require_once 'conexion.php';

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
```

### `ver_carrito.php`

```php
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
```

### Explicación

- La tabla `catalogo` contiene los productos disponibles.
- El catálogo se consulta desde la base `Compras`.
- Al agregar un producto, se guarda en una sesión como carrito temporal.
- La página del carrito muestra los elementos seleccionados y suma el total.
