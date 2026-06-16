<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Ingreso de cliente</h1>
    <form action="crear_sesion.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Continuar</button>
    </form>
</body>
</html>