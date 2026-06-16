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