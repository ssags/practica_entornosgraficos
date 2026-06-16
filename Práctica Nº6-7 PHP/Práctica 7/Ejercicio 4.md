# Práctica 7 - Ejercicio 4

## Consigna

Confeccionar una página que simule ser la de un periódico. La misma debe permitir configurar qué tipo de titular deseamos que aparezca al visitarla, pudiendo ser: noticia política, noticia económica o noticia deportiva.

Mediante tres objetos de tipo radio, permitir seleccionar qué titular debe mostrar el periódico. Almacenar en una cookie el tipo de titular que desea ver el cliente. La primera vez que visita el sitio deben aparecer los tres titulares. Disponer un hipervínculo a una tercera página que borre la cookie creada.

## Solución

### `periodico.php`

```php
<?php
$filtro = $_COOKIE['titular'] ?? 'todos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico</title>
</head>
<body>
    <h1>El Diario</h1>

    <form action="guardar_titular.php" method="post">
        <label><input type="radio" name="titular" value="todos" <?php echo $filtro === 'todos' ? 'checked' : ''; ?>> Mostrar todos</label><br>
        <label><input type="radio" name="titular" value="politica" <?php echo $filtro === 'politica' ? 'checked' : ''; ?>> Noticia política</label><br>
        <label><input type="radio" name="titular" value="economica" <?php echo $filtro === 'economica' ? 'checked' : ''; ?>> Noticia económica</label><br>
        <label><input type="radio" name="titular" value="deportiva" <?php echo $filtro === 'deportiva' ? 'checked' : ''; ?>> Noticia deportiva</label><br>
        <button type="submit">Guardar preferencia</button>
    </form>

    <hr>

    <?php if ($filtro === 'todos' || $filtro === 'politica'): ?>
        <h2>Noticia política</h2>
        <p>El congreso debatió nuevas medidas para la agenda nacional.</p>
    <?php endif; ?>

    <?php if ($filtro === 'todos' || $filtro === 'economica'): ?>
        <h2>Noticia económica</h2>
        <p>Se anunciaron cambios en los indicadores financieros del día.</p>
    <?php endif; ?>

    <?php if ($filtro === 'todos' || $filtro === 'deportiva'): ?>
        <h2>Noticia deportiva</h2>
        <p>El equipo local consiguió una victoria importante en el campeonato.</p>
    <?php endif; ?>

    <p><a href="borrar_titular.php">Borrar preferencia</a></p>
</body>
</html>
```

### `guardar_titular.php`

```php
<?php
if (isset($_POST['titular'])) {
    setcookie('titular', $_POST['titular'], time() + 60 * 60 * 24 * 30);
}

header('Location: periodico.php');
exit;
?>
```

### `borrar_titular.php`

```php
<?php
setcookie('titular', '', time() - 3600);
header('Location: periodico.php');
exit;
?>
```

### Explicación

- La cookie guarda el tipo de titular preferido.
- La primera vez se muestran todas las noticias.
- El formulario permite elegir un solo tipo de titular o verlas todas.
- El enlace final elimina la cookie para volver al estado inicial.
