# Práctica 7 - Ejercicio 8

## Consigna

Confeccionar un buscador de canciones. Para ello deberá crear una base de datos llamada `prueba` y una tabla denominada `buscador` con el atributo `canciones`.

## Solución propuesta

La aplicación recibe una palabra de búsqueda y muestra las canciones almacenadas en la base de datos que coinciden con el texto ingresado.

### Estructura SQL

```sql
CREATE DATABASE prueba;
USE prueba;

CREATE TABLE buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(150) NOT NULL
);
```

### `conexion.php`

```php
<?php
$link = mysqli_connect('localhost', 'root', '', 'prueba');

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_set_charset($link, 'utf8');
?>
```

### `buscador.php`

```php
<?php
require_once 'conexion.php';

$texto = '';
$resultado = null;

if (isset($_POST['buscar'])) {
    $texto = mysqli_real_escape_string($link, trim($_POST['texto'] ?? ''));
    $sql = "SELECT * FROM buscador WHERE canciones LIKE '%$texto%' ORDER BY canciones";
    $resultado = mysqli_query($link, $sql);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de canciones</title>
</head>
<body>
    <h1>Buscador de canciones</h1>

    <form method="post">
        <label for="texto">Buscar canción:</label>
        <input type="text" id="texto" name="texto" value="<?php echo htmlspecialchars($texto); ?>">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <h2>Resultados</h2>
        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <ul>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <li><?php echo htmlspecialchars($fila['canciones']); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron coincidencias.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
```

### Explicación

- La base `prueba` guarda las canciones en la tabla `buscador`.
- El formulario envía una palabra clave a la misma página.
- La consulta usa `LIKE` para encontrar coincidencias parciales.
- Si hay resultados, se listan las canciones encontradas.
