<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre_remitente = htmlspecialchars($_POST['nombre_remitente']);
    $email_remitente = htmlspecialchars($_POST['email_remitente']);
    $nombre_amigo = htmlspecialchars($_POST['nombre_amigo']);
    $email_amigo = htmlspecialchars($_POST['email_amigo']);
    $mensaje_personal = htmlspecialchars($_POST['mensaje_personal']);
    
    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre_remitente) && !empty($email_remitente) && !empty($email_amigo) && !empty($nombre_amigo)) {
        // Datos del correo
        $destinatario = $email_amigo;
        $asunto = $nombre_remitente . " te recomienda nuestro sitio";
        
        // Construir el cuerpo del correo
        $cuerpo = "<html><body>";
        $cuerpo .= "<h2>Hola " . $nombre_amigo . ",</h2>";
        $cuerpo .= "<p>" . $nombre_remitente . " (" . $email_remitente . ") te recomienda que visites nuestro sitio web.</p>";
        $cuerpo .= "<p><strong>Mensaje personal de " . $nombre_remitente . ":</strong></p>";
        $cuerpo .= "<p style='background-color: #f0f0f0; padding: 10px; border-left: 4px solid #4CAF50;'>\n";
        $cuerpo .= nl2br($mensaje_personal);
        $cuerpo .= "</p>";
        $cuerpo .= "<p>Visita nuestro sitio haciendo clic <a href='http://www.ejemplo.com'>aquí</a>.</p>";
        $cuerpo .= "<p>Te esperamos,<br><strong>El equipo del sitio</strong></p>";
        $cuerpo .= "</body></html>";
        
        // Encabezados
        $encabezados = "MIME-Version: 1.0\r\n";
        $encabezados .= "Content-type: text/html; charset=UTF-8\r\n";
        $encabezados .= "From: recomendaciones@ejemplo.com\r\n";
        $encabezados .= "Reply-To: " . $email_remitente . "\r\n";
        
        // Enviar correo
        if (mail($destinatario, $asunto, $cuerpo, $encabezados)) {
            echo "<p style='color: green;'><strong>¡Perfecto!</strong> Tu recomendación ha sido enviada a " . $nombre_amigo . " correctamente.</p>";
        } else {
            echo "<p style='color: red;'><strong>Error:</strong> No se pudo enviar la recomendación.</p>";
        }
    } else {
        echo "<p style='color: red;'><strong>Error:</strong> Por favor, completa todos los campos.</p>";
    }
}
?>

<html>
<head>
    <title>Recomendar este sitio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], textarea {
            width: 100%; max-width: 400px; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
        }
        textarea { resize: vertical; height: 150px; }
        button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .required { color: red; }
    </style>
</head>
<body>
    <h1>Recomendar este sitio a un amigo</h1>
    <p>Comparte nuestro sitio con alguien que creas que le interesará:</p>
    
    <form method="POST" action="recomendar.php">
        <h3>Tus datos</h3>
        
        <div class="form-group">
            <label for="nombre_remitente">Tu nombre <span class="required">*</span></label>
            <input type="text" name="nombre_remitente" id="nombre_remitente" required>
        </div>
        
        <div class="form-group">
            <label for="email_remitente">Tu email <span class="required">*</span></label>
            <input type="email" name="email_remitente" id="email_remitente" required>
        </div>
        
        <h3>Datos de tu amigo</h3>
        
        <div class="form-group">
            <label for="nombre_amigo">Nombre de tu amigo <span class="required">*</span></label>
            <input type="text" name="nombre_amigo" id="nombre_amigo" required>
        </div>
        
        <div class="form-group">
            <label for="email_amigo">Email de tu amigo <span class="required">*</span></label>
            <input type="email" name="email_amigo" id="email_amigo" required>
        </div>
        
        <div class="form-group">
            <label for="mensaje_personal">Mensaje personal (opcional)</label>
            <textarea name="mensaje_personal" id="mensaje_personal" placeholder="Cuéntale a tu amigo por qué le puede interesar nuestro sitio..."></textarea>
        </div>
        
        <button type="submit">Enviar Recomendación</button>
    </form>
</body>
</html>
