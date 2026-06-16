# Práctica 7 - Ejercicio 3

## Consigna

Crear un formulario que solicite la carga del nombre de usuario. Cuando se presione un botón crear una cookie para dicho usuario. Luego cada vez que ingrese al formulario mostrar el último nombre de usuario ingresado.

## Solución

### `form_usuario.php`

```php
<?php
$ultimoUsuario = $_COOKIE['ultimo_usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <h1>Formulario de usuario</h1>

    <?php if ($ultimoUsuario !== ''): ?>
        <p>Último usuario ingresado: <strong><?php echo htmlspecialchars($ultimoUsuario); ?></strong></p>
    <?php endif; ?>

    <form action="guardar_usuario.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
```

### `guardar_usuario.php`

```php
<?php
if (isset($_POST['usuario'])) {
    setcookie('ultimo_usuario', $_POST['usuario'], time() + 60 * 60 * 24 * 30);
}

header('Location: form_usuario.php');
exit;
?>
```

### Explicación

- El formulario muestra la última carga guardada en la cookie.
- Cuando se envía el nombre, se crea o actualiza la cookie `ultimo_usuario`.
- Luego se vuelve al formulario para seguir mostrando ese último valor.
