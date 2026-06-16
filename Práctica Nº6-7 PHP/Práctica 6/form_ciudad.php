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