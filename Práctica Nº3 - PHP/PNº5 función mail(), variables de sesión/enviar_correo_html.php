<?php
// Datos del correo
$destinatario = "contacto@ejemplo.com";
$asunto = "Correo de prueba con HTML";

// Mensaje en formato HTML
$mensaje = "<html><body>";
$mensaje .= "<h1>Hola, este es un correo HTML</h1>";
$mensaje .= "<p>Este correo contiene <strong>formato HTML</strong>.</p>";
$mensaje .= "<p>Puedes incluir:</p>";
$mensaje .= "<ul>";
$mensaje .= "<li>Títulos</li>";
$mensaje .= "<li>Listas</li>";
$mensaje .= "<li>Enlaces: <a href='http://www.ejemplo.com'>Mi sitio</a></li>";
$mensaje .= "<li>Estilos CSS inline</li>";
$mensaje .= "</ul>";
$mensaje .= "<p style='color: blue;'>Texto en azul</p>";
$mensaje .= "</body></html>";

// Encabezados para HTML
$encabezados = "MIME-Version: 1.0\r\n";
$encabezados .= "Content-type: text/html; charset=UTF-8\r\n";
$encabezados .= "From: remitente@ejemplo.com\r\n";
$encabezados .= "Reply-To: respuesta@ejemplo.com\r\n";

// Enviar correo
if (mail($destinatario, $asunto, $mensaje, $encabezados)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
