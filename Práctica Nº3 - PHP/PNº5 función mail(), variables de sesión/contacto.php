<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Correo del webmaster
        $destinatario = "webmaster@ejemplo.com";
        $asunto_mail = "Nuevo mensaje de contacto: " . $asunto;
        
        // Construir el cuerpo del correo
        $cuerpo = "<html><body>";
        $cuerpo .= "<h2>Nuevo mensaje de contacto</h2>";
        $cuerpo .= "<p><strong>Nombre:</strong> " . $nombre . "</p>";
        $cuerpo .= "<p><strong>Email:</strong> " . $email . "</p>";
        $cuerpo .= "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
        $cuerpo .= "<p><strong>Asunto:</strong> " . $asunto . "</p>";
        $cuerpo .= "<p><strong>Mensaje:</strong><br>" . nl2br($mensaje) . "</p>";
        $cuerpo .= "</body></html>";
        
        // Encabezados
        $encabezados = "MIME-Version: 1.0\r\n";
        $encabezados .= "Content-type: text/html; charset=UTF-8\r\n";
        $encabezados .= "From: " . $email . "\r\n";
        
        // Enviar correo
        if (mail($destinatario, $asunto_mail, $cuerpo, $encabezados)) {
            echo "<p style='color: green;'><strong>¡Gracias!</strong> Tu mensaje ha sido enviado correctamente.</p>";
        } else {
            echo "<p style='color: red;'><strong>Error:</strong> No se pudo enviar el mensaje.</p>";
        }
    } else {
        echo "<p style='color: red;'><strong>Error:</strong> Por favor, completa todos los campos obligatorios.</p>";
    }
}
?>

<html>
<head>
    <title>Página de Contacto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="tel"], textarea, select {
            width: 100%; max-width: 400px; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
        }
        textarea { resize: vertical; height: 150px; }
        button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .required { color: red; }
    </style>
</head>
<body>
    <h1>Página de Contacto</h1>
    <p>Completa el siguiente formulario para enviarnos tu consulta:</p>
    
    <form method="POST" action="contacto.php">
        <div class="form-group">
            <label for="nombre">Nombre <span class="required">*</span></label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email <span class="required">*</span></label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono">
        </div>
        
        <div class="form-group">
            <label for="asunto">Asunto</label>
            <select name="asunto" id="asunto">
                <option>Consulta general</option>
                <option>Soporte técnico</option>
                <option>Sugerencia</option>
                <option>Otro</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="mensaje">Mensaje <span class="required">*</span></label>
            <textarea name="mensaje" id="mensaje" required></textarea>
        </div>
        
        <button type="submit">Enviar Consulta</button>
    </form>
</body>
</html>
