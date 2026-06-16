# Práctica 6 - Ejercicio 2

## Consigna

Confeccionar una página HTML que presente un menú para realizar un ABML de una tabla de Ciudades, en una base de datos MySQL denominada `Capitales`.

Utilizando el modelo de ejemplo del apunte, implementar en PHP el menú de opciones, el alta, la baja, la modificación y el listado con y sin paginación de la tabla anterior.

---

## Propuesta de solución

La solución está armada con varios archivos PHP para mantener separadas las responsabilidades:

- `conexion.php`: abre la conexión con la base de datos `Capitales`.
- `index.php`: muestra el menú principal.
- `form_ciudad.php`: formulario para alta y modificación.
- `guardar_ciudad.php`: guarda los datos del formulario.
- `borrar_ciudad.php`: elimina un registro.
- `listado.php`: muestra el listado completo sin paginación.
- `listado_paginado.php`: muestra el listado con paginación.

---

## Estructura de la tabla

```sql
CREATE DATABASE Capitales;
USE Capitales;

CREATE TABLE ciudades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    habitantes INT NOT NULL,
    superficie DECIMAL(10,2) NOT NULL,
    tieneMetro TINYINT(1) NOT NULL DEFAULT 0
);
```

---

## Archivos PHP

### `conexion.php`

```php
<?php
$link = mysqli_connect("localhost", "root", "", "Capitales");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
?>
```

### `index.php`

```php
<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABML de Ciudades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .contenedor {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-top: 0;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 12px 0;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background: #1f6feb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
        }
        a:hover {
            background: #1558b0;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Menú de opciones</h1>
        <p>ABML de la tabla <strong>ciudades</strong> de la base <strong>Capitales</strong>.</p>
        <ul>
            <li><a href="form_ciudad.php">Alta de ciudad</a></li>
            <li><a href="listado.php">Listado sin paginación</a></li>
            <li><a href="listado_paginado.php">Listado con paginación</a></li>
        </ul>
    </div>
</body>
</html>
```

### `form_ciudad.php`

```php
<?php
require_once 'conexion.php';

$registro = [
    'id' => 0,
    'ciudad' => '',
    'pais' => '',
    'habitantes' => '',
    'superficie' => '',
    'tieneMetro' => 0
];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $consulta = "SELECT * FROM ciudades WHERE id = $id";
    $resultado = mysqli_query($link, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $registro = mysqli_fetch_assoc($resultado);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de ciudad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
        }
        .contenedor {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }
        .acciones {
            margin-top: 18px;
        }
        button, a {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }
        button {
            background: #1f6feb;
            color: white;
        }
        a {
            background: #6c757d;
            color: white;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1><?php echo $registro['id'] ? 'Modificar ciudad' : 'Alta de ciudad'; ?></h1>

        <form action="guardar_ciudad.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['id']); ?>">

            <label for="ciudad">Ciudad</label>
            <input type="text" id="ciudad" name="ciudad" required value="<?php echo htmlspecialchars($registro['ciudad']); ?>">

            <label for="pais">País</label>
            <input type="text" id="pais" name="pais" required value="<?php echo htmlspecialchars($registro['pais']); ?>">

            <label for="habitantes">Habitantes</label>
            <input type="number" id="habitantes" name="habitantes" required value="<?php echo htmlspecialchars($registro['habitantes']); ?>">

            <label for="superficie">Superficie</label>
            <input type="number" step="0.01" id="superficie" name="superficie" required value="<?php echo htmlspecialchars($registro['superficie']); ?>">

            <label for="tieneMetro">¿Tiene metro?</label>
            <select id="tieneMetro" name="tieneMetro">
                <option value="1" <?php echo ($registro['tieneMetro'] == 1) ? 'selected' : ''; ?>>Sí</option>
                <option value="0" <?php echo ($registro['tieneMetro'] == 0) ? 'selected' : ''; ?>>No</option>
            </select>

            <div class="acciones">
                <button type="submit">Guardar</button>
                <a href="index.php">Volver al menú</a>
            </div>
        </form>
    </div>
</body>
</html>
```

### `guardar_ciudad.php`

```php
<?php
require_once 'conexion.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$ciudad = mysqli_real_escape_string($link, trim($_POST['ciudad'] ?? ''));
$pais = mysqli_real_escape_string($link, trim($_POST['pais'] ?? ''));
$habitantes = (int) ($_POST['habitantes'] ?? 0);
$superficie = (float) ($_POST['superficie'] ?? 0);
$tieneMetro = isset($_POST['tieneMetro']) ? (int) $_POST['tieneMetro'] : 0;

if ($id > 0) {
    $sql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
} else {
    $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
}

if (!mysqli_query($link, $sql)) {
    die('Error al guardar: ' . mysqli_error($link));
}

header('Location: listado.php');
exit;
?>
```

### `borrar_ciudad.php`

```php
<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM ciudades WHERE id = $id";

    if (!mysqli_query($link, $sql)) {
        die('Error al borrar: ' . mysqli_error($link));
    }
}

header('Location: listado.php');
exit;
?>
```

### `listado.php`

```php
<?php
require_once 'conexion.php';

$sql = "SELECT * FROM ciudades ORDER BY id";
$resultado = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de ciudades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
        }
        .contenedor {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #e9ecef;
        }
        a {
            margin-right: 8px;
        }
        .acciones-superiores {
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Listado completo</h1>
        <div class="acciones-superiores">
            <a href="index.php">Volver al menú</a> |
            <a href="form_ciudad.php">Alta de ciudad</a> |
            <a href="listado_paginado.php">Ver listado paginado</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>ciudad</th>
                    <th>país</th>
                    <th>habitantes</th>
                    <th>superficie</th>
                    <th>tieneMetro</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo htmlspecialchars($fila['ciudad']); ?></td>
                            <td><?php echo htmlspecialchars($fila['pais']); ?></td>
                            <td><?php echo $fila['habitantes']; ?></td>
                            <td><?php echo $fila['superficie']; ?></td>
                            <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <a href="form_ciudad.php?id=<?php echo $fila['id']; ?>">Modificar</a>
                                <a href="borrar_ciudad.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea eliminar esta ciudad?');">Borrar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay registros cargados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
```

### `listado_paginado.php`

```php
<?php
require_once 'conexion.php';

$porPagina = 5;
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
if ($pagina < 1) {
    $pagina = 1;
}

$inicio = ($pagina - 1) * $porPagina;

$sqlTotal = "SELECT COUNT(*) AS total FROM ciudades";
$resultadoTotal = mysqli_query($link, $sqlTotal);
$totalRegistros = 0;

if ($resultadoTotal) {
    $filaTotal = mysqli_fetch_assoc($resultadoTotal);
    $totalRegistros = (int) $filaTotal['total'];
}

$totalPaginas = $totalRegistros > 0 ? (int) ceil($totalRegistros / $porPagina) : 1;

$sql = "SELECT * FROM ciudades ORDER BY id LIMIT $inicio, $porPagina";
$resultado = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado paginado de ciudades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
        }
        .contenedor {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #e9ecef;
        }
        .paginacion a, .paginacion span {
            display: inline-block;
            margin: 4px 4px 0 0;
            padding: 8px 12px;
            border: 1px solid #1f6feb;
            border-radius: 6px;
            text-decoration: none;
        }
        .paginacion span {
            background: #1f6feb;
            color: white;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Listado con paginación</h1>
        <div class="acciones-superiores">
            <a href="index.php">Volver al menú</a> |
            <a href="form_ciudad.php">Alta de ciudad</a> |
            <a href="listado.php">Ver listado sin paginación</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>ciudad</th>
                    <th>país</th>
                    <th>habitantes</th>
                    <th>superficie</th>
                    <th>tieneMetro</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo htmlspecialchars($fila['ciudad']); ?></td>
                            <td><?php echo htmlspecialchars($fila['pais']); ?></td>
                            <td><?php echo $fila['habitantes']; ?></td>
                            <td><?php echo $fila['superficie']; ?></td>
                            <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <a href="form_ciudad.php?id=<?php echo $fila['id']; ?>">Modificar</a>
                                <a href="borrar_ciudad.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea eliminar esta ciudad?');">Borrar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay registros cargados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="paginacion">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i == $pagina): ?>
                    <span><?php echo $i; ?></span>
                <?php else: ?>
                    <a href="listado_paginado.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
```

---

## Explicación general

El menú principal funciona como punto de entrada y enlaza con cada operación del ABML.

- El **alta** se resuelve con un formulario HTML que envía los datos a `guardar_ciudad.php`.
- La **modificación** reutiliza el mismo formulario, pero cargando previamente el registro según el `id`.
- La **baja** se hace con un enlace que llama a `borrar_ciudad.php`.
- El **listado sin paginación** muestra todos los registros de la tabla.
- El **listado con paginación** divide los resultados en páginas usando `LIMIT` y `COUNT(*)`.

De esta forma queda implementado el flujo completo pedido en la consigna.