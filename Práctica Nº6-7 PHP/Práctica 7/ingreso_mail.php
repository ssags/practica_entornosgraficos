<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de mail</title>
</head>
<body>
    <h1>Buscar alumno por mail</h1>
    <form action="validar_alumno.php" method="post">
        <label for="mail">Mail del alumno:</label>
        <input type="email" id="mail" name="mail" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>