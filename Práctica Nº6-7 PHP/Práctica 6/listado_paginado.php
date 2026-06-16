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