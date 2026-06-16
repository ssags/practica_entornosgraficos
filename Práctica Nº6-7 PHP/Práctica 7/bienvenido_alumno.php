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