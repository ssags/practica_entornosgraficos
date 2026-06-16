# Práctica 7 - Ejercicio 5

## Consigna

Realizar una página donde carguemos en un formulario el nombre de usuario y clave de un cliente. Luego realizar una segunda página donde se creen dos variables de sesión. Y como última página crear una tercera en la cual se recuperen los valores almacenados en las variables de sesión anterior.

## Solución

### `login.php`

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
</head>
<body>
    <h1>Formulario de acceso</h1>
    <form action="crear_sesion.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br><br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
```

### `crear_sesion.php`

```php
<?php
session_start();

if (isset($_POST['usuario'], $_POST['clave'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave'] = $_POST['clave'];
}

header('Location: mostrar_sesion.php');
exit;
?>
```

### `mostrar_sesion.php`

```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de sesión</title>
</head>
<body>
    <h1>Valores guardados en sesión</h1>

    <?php if (isset($_SESSION['usuario'], $_SESSION['clave'])): ?>
        <p>Usuario: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <p>Clave: <strong><?php echo htmlspecialchars($_SESSION['clave']); ?></strong></p>
    <?php else: ?>
        <p>No hay datos de sesión cargados.</p>
    <?php endif; ?>
</body>
</html>
```

### Explicación

- El formulario envía usuario y clave a una segunda página.
- Esa página inicia la sesión y guarda los valores en `$_SESSION`.
- La tercera página recupera esos datos y los muestra.
- De esa forma se cumple la idea de trabajar con variables de sesión entre distintas páginas.
