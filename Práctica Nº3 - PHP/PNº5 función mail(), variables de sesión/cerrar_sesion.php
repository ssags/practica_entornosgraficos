<?php
session_start();

// Destruir la sesión
session_destroy();

?>

<html>
<head>
    <title>Sesión cerrada</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .info { background-color: #ffebee; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background-color: #0b7dda; }
    </style>
</head>
<body>
    <h1>Sesión cerrada</h1>
    
    <div class="info">
        <p><strong>Has cerrado la sesión correctamente.</strong></p>
        <p>El contador se ha reiniciado y se creará una nueva sesión cuando vuelvas a visitar el sitio.</p>
    </div>
    
    <a href="inicio_sesion.php">Volver al inicio</a>
</body>
</html>
