# Práctica 7 - Ejercicio 6

## Consigna

Confeccionar un formulario que solicite ingresar el mail de un alumno. Si el mail existe en la tabla alumnos, rescatar su nombre y almacenarlo en una variable de sesión. Además disponer un hipervínculo a una tercera página que verifique si existe la variable de sesión y dé la bienvenida al alumno; en caso contrario mostrar un mensaje indicando que no puede visitar esta página.

Para la realización del ejercicio crear una base de datos con el nombre `base2`. La misma debe tener una tabla denominada `alumnos` con atributos: `codigo`, `nombre`, `codigocurso`, `mail`.

## Solución propuesta

La solución se divide en tres páginas principales: una para ingresar el mail, otra para validar si el alumno existe en la base de datos y guardar su nombre en sesión, y una tercera para mostrar la bienvenida si la sesión está disponible.

### Estructura SQL

```sql
CREATE DATABASE base2;
USE base2;

CREATE TABLE alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso INT NOT NULL,
    mail VARCHAR(120) NOT NULL
);
```

### `conexion.php`

```php
<?php
$link = mysqli_connect('localhost', 'root', '', 'base2');

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_set_charset($link, 'utf8');
?>
```

### `ingreso_mail.php`

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de mail</title>
</head>
<body>
    <h1>Buscar alumno por mail</h1>
    <form action="validar_alumno.php" method="post">
        <label for="mail">Mail del alumno:</label>
        <input type="email" id="mail" name="mail" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
```

### `validar_alumno.php`

```php
<?php
session_start();
require_once 'conexion.php';

$mail = mysqli_real_escape_string($link, trim($_POST['mail'] ?? ''));
$sql = "SELECT nombre FROM alumnos WHERE mail = '$mail' LIMIT 1";
$resultado = mysqli_query($link, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['nombre'] = $fila['nombre'];
    $mensaje = 'Alumno encontrado. Ya puede ingresar a la página protegida.';
} else {
    unset($_SESSION['nombre']);
    $mensaje = 'El mail no existe en la tabla alumnos.';
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de la búsqueda</h1>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <p><a href="bienvenido.php">Ir a la tercera página</a></p>
    <p><a href="ingreso_mail.php">Volver</a></p>
</body>
</html>
```

### `bienvenido.php`

```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <?php if (isset($_SESSION['nombre'])): ?>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
        <p>Su sesión está activa y puede visitar esta página.</p>
    <?php else: ?>
        <h1>No puede visitar esta página</h1>
        <p>Debe ingresar primero un mail válido de la tabla alumnos.</p>
    <?php endif; ?>
</body>
</html>
```

### Explicación

- El formulario solicita el mail del alumno.
- La segunda página consulta la base `base2` y busca coincidencias en la tabla `alumnos`.
- Si encuentra el mail, guarda el nombre en `$_SESSION['nombre']`.
- La tercera página usa `isset($_SESSION['nombre'])` para verificar si hay sesión activa.
- Si existe, da la bienvenida; si no, muestra el mensaje de acceso denegado.
