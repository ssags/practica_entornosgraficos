<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABML de Ciudades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .contenedor {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-top: 0;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 12px 0;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background: #1f6feb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
        }
        a:hover {
            background: #1558b0;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Menú de opciones</h1>
        <p>ABML de la tabla <strong>ciudades</strong> de la base <strong>Capitales</strong>.</p>
        <ul>
            <li><a href="form_ciudad.php">Alta de ciudad</a></li>
            <li><a href="listado.php">Listado sin paginación</a></li>
            <li><a href="listado_paginado.php">Listado con paginación</a></li>
        </ul>
    </div>
</body>
</html>