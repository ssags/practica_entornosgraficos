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