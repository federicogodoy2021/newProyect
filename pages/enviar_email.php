<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $motivo = $_POST["motivo"];
    $notificaciones = isset($_POST["notificaciones"]) ? "Sí" : "No";
    $comentarios = $_POST["comentarios"];

    // Configurar el correo electrónico
    $destinatario = "federicomartingodoy@gmail.com"; // Reemplaza con tu dirección de correo electrónico
    $asunto = "Consulta de contacto";

    $mensaje = "Nombre: " . $nombre . "\n";
    $mensaje .= "Email: " . $email . "\n";
    $mensaje .= "Motivo: " . $motivo . "\n";
    $mensaje .= "Recibir notificaciones: " . $notificaciones . "\n";
    $mensaje .= "Comentarios: " . $comentarios . "\n";

    // Enviar el correo electrónico
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        // El correo se envió correctamente
        echo "Gracias por contactarnos. Te responderemos a la brevedad.";
    } else {
        // Hubo un error al enviar el correo
        echo "Lo sentimos, ocurrió un error al enviar tu consulta. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>
