<?php
require_once 'conexion_prueba.php';

$texto = '';
$resultado = null;

if (isset($_POST['buscar'])) {
    $texto = mysqli_real_escape_string($link, trim($_POST['texto'] ?? ''));
    $sql = "SELECT * FROM buscador WHERE canciones LIKE '%$texto%' ORDER BY canciones";
    $resultado = mysqli_query($link, $sql);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de canciones</title>
</head>
<body>
    <h1>Buscador de canciones</h1>

    <form method="post">
        <label for="texto">Buscar canción:</label>
        <input type="text" id="texto" name="texto" value="<?php echo htmlspecialchars($texto); ?>">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <h2>Resultados</h2>
        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <ul>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <li><?php echo htmlspecialchars($fila['canciones']); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron coincidencias.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>