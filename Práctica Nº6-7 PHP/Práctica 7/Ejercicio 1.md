# Práctica 7 - Ejercicio 1

## Consigna

Crear una página que puede configurarse con distintos estilos CSS. El usuario es quien decide qué aspecto desea que tenga la página, por medio de un formulario. Luego la página es capaz de recordar, entre los distintos accesos que realice el usuario, el aspecto que había elegido para mostrar la web.

## Solución

La propuesta utiliza una cookie para guardar el estilo elegido por el usuario. El formulario permite seleccionar un tema visual y, cuando la página vuelve a cargarse, lee la cookie y aplica el estilo correspondiente.

### `index.php`

```php
<?php
$tema = $_COOKIE['tema'] ?? 'claro';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurador de estilos</title>
    <?php if ($tema === 'oscuro'): ?>
    <style>
        body { background: #121212; color: #f2f2f2; font-family: Arial, sans-serif; }
        .contenedor { max-width: 700px; margin: 40px auto; padding: 24px; background: #1f1f1f; border-radius: 12px; }
        select, button { padding: 10px; border-radius: 8px; border: 1px solid #444; }
        button { background: #4f8cff; color: white; border: 0; }
    </style>
    <?php elseif ($tema === 'colorido'): ?>
    <style>
        body { background: linear-gradient(135deg, #ffecd2, #fcb69f); color: #4a2c2a; font-family: Georgia, serif; }
        .contenedor { max-width: 700px; margin: 40px auto; padding: 24px; background: rgba(255,255,255,0.8); border-radius: 18px; }
        select, button { padding: 10px; border-radius: 8px; border: 1px solid #d18b6c; }
        button { background: #ff6b6b; color: white; border: 0; }
    </style>
    <?php else: ?>
    <style>
        body { background: #f5f7fb; color: #1f2937; font-family: Arial, sans-serif; }
        .contenedor { max-width: 700px; margin: 40px auto; padding: 24px; background: white; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
        select, button { padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; }
        button { background: #2563eb; color: white; border: 0; }
    </style>
    <?php endif; ?>
</head>
<body>
    <div class="contenedor">
        <h1>Configuración de estilo</h1>
        <p>El estilo actual de la página es: <strong><?php echo htmlspecialchars($tema); ?></strong></p>

        <form action="guardar_tema.php" method="post">
            <label for="tema">Elegir estilo:</label>
            <select name="tema" id="tema">
                <option value="claro" <?php echo $tema === 'claro' ? 'selected' : ''; ?>>Claro</option>
                <option value="oscuro" <?php echo $tema === 'oscuro' ? 'selected' : ''; ?>>Oscuro</option>
                <option value="colorido" <?php echo $tema === 'colorido' ? 'selected' : ''; ?>>Colorido</option>
            </select>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
```

### `guardar_tema.php`

```php
<?php
if (isset($_POST['tema'])) {
    setcookie('tema', $_POST['tema'], time() + 60 * 60 * 24 * 30);
}

header('Location: index.php');
exit;
?>
```

### Explicación

- El formulario permite elegir un tema visual.
- La selección se guarda en la cookie `tema`.
- En cada acceso, la página lee esa cookie y aplica el CSS correspondiente.
- De ese modo el sitio recuerda el aspecto elegido por el usuario.

##