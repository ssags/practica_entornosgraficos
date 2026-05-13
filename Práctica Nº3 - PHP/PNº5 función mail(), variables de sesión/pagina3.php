<?php
session_start();

// El contador se incrementa cada vez que se carga una página
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

$_SESSION['contador']++;

?>

<html>
<head>
    <title>Página 3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #f3e5f5; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .links { margin-top: 20px; }
        a { display: inline-block; margin: 10px 10px 10px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Página 3</h1>
    
    <div class="info">
        <p><strong>Páginas visitadas en esta sesión:</strong> <?php echo $_SESSION['contador']; ?></p>
        <p>Estás en la página 3. La sesión se mantiene mientras sigas navegando.</p>
    </div>
    
    <div class="links">
        <a href="inicio_sesion.php">Volver a Inicio</a>
        <a href="pagina2.php">Ir a Página 2</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
