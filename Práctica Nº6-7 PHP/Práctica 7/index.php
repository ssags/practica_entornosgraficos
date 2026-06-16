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