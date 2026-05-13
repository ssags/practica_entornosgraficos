<?php
session_start();

// Inicializar el contador si no existe
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Incrementar el contador
$_SESSION['contador']++;

// Obtener la hora actual
$hora_actual = date('H:i:s');

?>

<html>
<head>
    <title>Contador de páginas visitadas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #e3f2fd; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .links { margin-top: 20px; }
        a { display: inline-block; margin: 10px 10px 10px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Bienvenido a la página de inicio</h1>
    
    <div class="info">
        <p><strong>Páginas visitadas en esta sesión:</strong> <?php echo $_SESSION['contador']; ?></p>
        <p><strong>Hora actual:</strong> <?php echo $hora_actual; ?></p>
        <p><strong>ID de sesión:</strong> <?php echo session_id(); ?></p>
    </div>
    
    <p>Navega por las diferentes páginas para ver cómo aumenta el contador.</p>
    
    <div class="links">
        <a href="pagina2.php">Ir a Página 2</a>
        <a href="pagina3.php">Ir a Página 3</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
