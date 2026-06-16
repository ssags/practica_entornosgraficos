# Práctica 7 - PHP

## Ejercicio 1

### Consigna

Crear una página que pueda configurarse con distintos estilos CSS. El usuario decide qué aspecto desea que tenga la página por medio de un formulario. Luego la página debe recordar, entre los distintos accesos, el estilo elegido para mostrar la web.

### Solución propuesta

La solución usa una cookie para recordar el estilo seleccionado y aplicar la hoja de estilo correspondiente en cada visita.

#### `index.php`

```php
<?php
$estilo = $_COOKIE['estilo'] ?? 'claro';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['estilo'])) {
    $estilo = $_POST['estilo'];
    setcookie('estilo', $estilo, time() + 60 * 60 * 24 * 30);
}

$clase = 'tema-' . $estilo;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página configurable</title>
    <style>
        body { font-family: Arial, sans-serif; transition: all 0.3s ease; }
        .contenedor { max-width: 760px; margin: 40px auto; padding: 24px; border-radius: 12px; }
        .tema-claro { background: #f5f7fa; color: #1f2937; }
        .tema-oscuro { background: #111827; color: #f9fafb; }
        .tema-azul { background: #e0f2fe; color: #0f172a; }
        fieldset { border: 1px solid #ccc; padding: 16px; margin-top: 18px; }
        label { display: block; margin: 8px 0; }
        button { margin-top: 12px; padding: 10px 14px; border: 0; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body class="<?php echo $clase; ?>">
    <div class="contenedor">
        <h1>Configuración de estilos</h1>
        <p>El estilo seleccionado se guarda en una cookie para recordarlo en próximas visitas.</p>

        <form method="post">
            <fieldset>
                <legend>Elegir estilo</legend>
                <label><input type="radio" name="estilo" value="claro" <?php echo $estilo === 'claro' ? 'checked' : ''; ?>> Claro</label>
                <label><input type="radio" name="estilo" value="oscuro" <?php echo $estilo === 'oscuro' ? 'checked' : ''; ?>> Oscuro</label>
                <label><input type="radio" name="estilo" value="azul" <?php echo $estilo === 'azul' ? 'checked' : ''; ?>> Azul</label>
            </fieldset>
            <button type="submit">Guardar preferencia</button>
        </form>
    </div>
</body>
</html>
```

### Explicación

- El formulario permite elegir un estilo visual.
- Al enviar el formulario, el valor se guarda en la cookie `estilo`.
- En cada visita posterior, la página lee esa cookie y aplica la clase CSS correspondiente.

---

## Ejercicio 2

### Consigna

Crear una cookie llamada `contador` que lleve la cuenta del número de veces que se ha accedido a la página `contador.php`. Si es la primera vez, la página debe dar la bienvenida al usuario. Si ya se accedió anteriormente, debe mostrar cuántas veces se visitó.

### `contador.php`

```php
<?php
$contador = $_COOKIE['contador'] ?? 0;

if ($contador == 0) {
    $contador = 1;
    setcookie('contador', $contador, time() + 60 * 60 * 24 * 30);
    $mensaje = 'Bienvenido por primera vez a la página.';
} else {
    $contador++;
    setcookie('contador', $contador, time() + 60 * 60 * 24 * 30);
    $mensaje = 'Esta página fue visitada ' . $contador . ' veces.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>
<body>
    <h1>Contador de visitas</h1>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
```

### Explicación

- Si la cookie no existe, se considera la primera visita.
- Si ya existe, se incrementa el valor almacenado.
- La cookie se vuelve a guardar en cada acceso.

---

## Ejercicio 3

### Consigna

Crear un formulario que solicite la carga del nombre de usuario. Cuando se presione un botón, crear una cookie para dicho usuario. Luego, cada vez que ingrese al formulario, mostrar el último nombre de usuario ingresado.

### `usuario.php`

```php
<?php
$ultimoUsuario = $_COOKIE['ultimo_usuario'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['usuario'])) {
    $ultimoUsuario = trim($_POST['usuario']);
    setcookie('ultimo_usuario', $ultimoUsuario, time() + 60 * 60 * 24 * 30);
}
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

    <?php if (!empty($ultimoUsuario)): ?>
        <p>Último usuario ingresado: <strong><?php echo htmlspecialchars($ultimoUsuario); ?></strong></p>
    <?php endif; ?>

    <form method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
```

### Explicación

- El formulario recibe un nombre de usuario.
- Al enviarlo, se guarda en la cookie `ultimo_usuario`.
- Cada vez que se vuelve a abrir la página, se muestra el último valor guardado.

---

## Ejercicio 4

### Consigna

Confeccionar una página que simule ser la de un periódico. Debe permitir configurar qué tipo de titular se desea ver: noticia política, económica o deportiva. Mediante tres radios, permitir seleccionar qué titular mostrar. Almacenar en una cookie el tipo de titular que desea ver el cliente. La primera vez que visita el sitio deben aparecer los tres titulares. Disponer un hipervínculo a una tercera página que borre la cookie creada.

### Solución propuesta

#### `periodico.php`

```php
<?php
$titular = $_COOKIE['titular'] ?? 'todos';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie('titular', $titular, time() + 60 * 60 * 24 * 30);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico</title>
    <style>
        body { font-family: Georgia, serif; background: #f5f2ea; margin: 0; padding: 24px; }
        .portada { max-width: 900px; margin: 0 auto; background: white; padding: 24px; border-radius: 12px; }
        .noticia { padding: 12px 0; border-bottom: 1px solid #ddd; }
        .politica { color: #8b0000; }
        .economica { color: #0b6b3a; }
        .deportiva { color: #1d4ed8; }
    </style>
</head>
<body>
    <div class="portada">
        <h1>Periódico del día</h1>

        <form method="post">
            <label><input type="radio" name="titular" value="todos" <?php echo $titular === 'todos' ? 'checked' : ''; ?>> Mostrar todos</label>
            <label><input type="radio" name="titular" value="politica" <?php echo $titular === 'politica' ? 'checked' : ''; ?>> Política</label>
            <label><input type="radio" name="titular" value="economica" <?php echo $titular === 'economica' ? 'checked' : ''; ?>> Económica</label>
            <label><input type="radio" name="titular" value="deportiva" <?php echo $titular === 'deportiva' ? 'checked' : ''; ?>> Deportiva</label>
            <button type="submit">Guardar preferencia</button>
        </form>

        <div class="noticia politica" <?php echo ($titular !== 'todos' && $titular !== 'politica') ? 'style="display:none;"' : ''; ?>>
            <h2>Noticia política</h2>
            <p>El congreso debatió una nueva ley de interés nacional.</p>
        </div>

        <div class="noticia economica" <?php echo ($titular !== 'todos' && $titular !== 'economica') ? 'style="display:none;"' : ''; ?>>
            <h2>Noticia económica</h2>
            <p>Se registró una variación positiva en los indicadores del mercado.</p>
        </div>

        <div class="noticia deportiva" <?php echo ($titular !== 'todos' && $titular !== 'deportiva') ? 'style="display:none;"' : ''; ?>>
            <h2>Noticia deportiva</h2>
            <p>El equipo local ganó el partido en una definición emocionante.</p>
        </div>

        <p><a href="borrar_titular.php">Borrar preferencia guardada</a></p>
    </div>
</body>
</html>
```

#### `borrar_titular.php`

```php
<?php
setcookie('titular', '', time() - 3600);
header('Location: periodico.php');
exit;
?>
```

### Explicación

- La cookie guarda el tipo de titular elegido.
- Si no existe cookie, se muestran las tres noticias.
- El enlace de borrado elimina la preferencia guardada y vuelve a mostrar la portada completa.

---

## Ejercicio 5

### Consigna

Realizar una página donde se cargue el nombre de usuario y clave de un cliente. Luego realizar una segunda página donde se creen dos variables de sesión. Y como última página crear una tercera en la cual se recuperen los valores almacenados en las variables de sesión anteriores.

### Solución propuesta

#### `login.php`

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Ingreso de cliente</h1>
    <form action="crear_sesion.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Continuar</button>
    </form>
</body>
</html>
```

#### `crear_sesion.php`

```php
<?php
session_start();

$_SESSION['usuario'] = $_POST['usuario'] ?? '';
$_SESSION['clave'] = $_POST['clave'] ?? '';

header('Location: mostrar_sesion.php');
exit;
?>
```

#### `mostrar_sesion.php`

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
    <h1>Datos recuperados de sesión</h1>
    <p>Usuario: <?php echo htmlspecialchars($_SESSION['usuario'] ?? ''); ?></p>
    <p>Clave: <?php echo htmlspecialchars($_SESSION['clave'] ?? ''); ?></p>
</body>
</html>
```

### Explicación

- La primera página recibe los datos del formulario.
- La segunda inicia la sesión y guarda los valores en `$_SESSION`.
- La tercera recupera los datos almacenados y los muestra.

---

## Observación general

En todos los ejercicios se utiliza el mecanismo correspondiente a cada caso:

- **Cookies** para recordar datos en el cliente.
- **Sesiones** para conservar información entre páginas del mismo usuario en el servidor.

Esto permite reproducir el tipo de soluciones que se ven en el apunte de la práctica.