# Práctica 7 - Ejercicio 2

## Consigna

Crear una cookie llamada `contador` que lleve la cuenta en el lado cliente del número de veces que se ha accedido a la página `contador.php`. Si es la primera vez que se accede, la página dará la bienvenida al usuario. Si ya se ha accedido anteriormente, la página hará uso de la cookie para mostrar el número de veces que se ha visitado dicha página.

## Solución

### `contador.php`

```php
<?php
$contador = isset($_COOKIE['contador']) ? (int) $_COOKIE['contador'] : 0;
$contador++;
setcookie('contador', (string) $contador, time() + 60 * 60 * 24 * 30);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>
<body>
    <?php if ($contador === 1): ?>
        <h1>Bienvenido por primera vez a la página.</h1>
    <?php else: ?>
        <h1>Has visitado esta página <?php echo $contador; ?> veces.</h1>
    <?php endif; ?>
</body>
</html>
```

### Explicación

- Si la cookie no existe, el contador arranca en cero.
- En cada visita se incrementa en uno y se vuelve a guardar.
- La primera vez muestra un mensaje de bienvenida.
- En las siguientes visitas informa cuántas veces se accedió a la página.
