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