<?php
session_start();
require_once 'conexion_base2.php';

$mail = mysqli_real_escape_string($link, trim($_POST['mail'] ?? ''));
$sql = "SELECT nombre FROM alumnos WHERE mail = '$mail' LIMIT 1";
$resultado = mysqli_query($link, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['nombre'] = $fila['nombre'];
    $mensaje = 'Alumno encontrado. Ya puede ingresar a la página protegida.';
} else {
    unset($_SESSION['nombre']);
    $mensaje = 'El mail no existe en la tabla alumnos.';
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de la búsqueda</h1>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <p><a href="bienvenido_alumno.php">Ir a la tercera página</a></p>
    <p><a href="ingreso_mail.php">Volver</a></p>
</body>
</html>