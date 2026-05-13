# Agustina Chacón - 50980 - Entornos Gráficos

## Variables de sesión

La función `session_start()` inicia una sesión para el usuario o continúa la sesión abierta en otras páginas.

La sesión se tiene que inicializar antes de escribir cualquier texto en la página.

Una vez inicializada, se pueden utilizar variables de sesión a través del array asociativo:

```php
$_SESSION["nombre_variable"]
```

Es decir, almacenar datos para ese usuario que se conserven durante toda su visita o recuperar datos almacenados en páginas que haya visitado.

---

## Ejercicio 4

Contar las páginas visitadas por un usuario durante su sesión.

---

## Respuesta

### Archivo: `inicio_sesion.php`

```php
<?php
session_start();

// Inicializar el contador si no existe
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Incrementar el contador
$_SESSION['contador']++;

// Obtener la hora actual
$hora_actual = date('H:i:s');

?>

<html>
<head>
    <title>Contador de páginas visitadas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #e3f2fd; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .links { margin-top: 20px; }
        a { display: inline-block; margin: 10px 10px 10px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Bienvenido a la página de inicio</h1>
    
    <div class="info">
        <p><strong>Páginas visitadas en esta sesión:</strong> <?php echo $_SESSION['contador']; ?></p>
        <p><strong>Hora actual:</strong> <?php echo $hora_actual; ?></p>
        <p><strong>ID de sesión:</strong> <?php echo session_id(); ?></p>
    </div>
    
    <p>Navega por las diferentes páginas para ver cómo aumenta el contador.</p>
    
    <div class="links">
        <a href="pagina2.php">Ir a Página 2</a>
        <a href="pagina3.php">Ir a Página 3</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
```

### Archivo: `pagina2.php`

```php
<?php
session_start();

// El contador se incrementa cada vez que se carga una página
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

$_SESSION['contador']++;

?>

<html>
<head>
    <title>Página 2</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #fff3e0; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .links { margin-top: 20px; }
        a { display: inline-block; margin: 10px 10px 10px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Página 2</h1>
    
    <div class="info">
        <p><strong>Páginas visitadas en esta sesión:</strong> <?php echo $_SESSION['contador']; ?></p>
        <p>Estas en la página 2. El contador se incrementa cada vez que cargas una nueva página.</p>
    </div>
    
    <div class="links">
        <a href="inicio_sesion.php">Volver a Inicio</a>
        <a href="pagina3.php">Ir a Página 3</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
```

### Archivo: `pagina3.php`

```php
<?php
session_start();

// El contador se incrementa cada vez que se carga una página
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

$_SESSION['contador']++;

?>

<html>
<head>
    <title>Página 3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #f3e5f5; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .links { margin-top: 20px; }
        a { display: inline-block; margin: 10px 10px 10px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Página 3</h1>
    
    <div class="info">
        <p><strong>Páginas visitadas en esta sesión:</strong> <?php echo $_SESSION['contador']; ?></p>
        <p>Estás en la página 3. La sesión se mantiene mientras sigas navegando.</p>
    </div>
    
    <div class="links">
        <a href="inicio_sesion.php">Volver a Inicio</a>
        <a href="pagina2.php">Ir a Página 2</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
```

### Archivo: `cerrar_sesion.php`

```php
<?php
session_start();

// Destruir la sesión
session_destroy();

?>

<html>
<head>
    <title>Sesión cerrada</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #ffebee; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #0b7dda; }
    </style>
</head>
<body>
    <h1>Sesión cerrada</h1>
    
    <div class="info">
        <p><strong>Has cerrado la sesión correctamente.</strong></p>
        <p>El contador se ha reiniciado y se creará una nueva sesión cuando vuelvas a visitar el sitio.</p>
    </div>
    
    <a href="inicio_sesion.php">Volver al inicio</a>
</body>
</html>
```

### Características

- `session_start()` inicia o continua la sesión en cada página.
- Se almacena el contador en `$_SESSION['contador']`.
- El contador persiste mientras el usuario navegue entre páginas.
- Cada nueva carga incrementa el contador.
- `session_destroy()` cierra la sesión y reinicia el contador.
- Se muestra el ID de sesión y la hora actual como información adicional.