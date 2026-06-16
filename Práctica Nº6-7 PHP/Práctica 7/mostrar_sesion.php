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