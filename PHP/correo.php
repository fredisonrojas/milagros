<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = ''; 
        $mail->SMTPAuth = true;
        $mail->Username = 'andres52885241@gmail.com'; 
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('andres52885241@gmail.com', 'Andrés Gutiérrez');
        $mail->addAddress('andres52885241@gmail.com');
        $mail->isHTML(true);

        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
        $mail->Body = "Nombre: $nombre<br>Correo: $correo<br>Mensaje: $mensaje";

        $mail->send();
        echo 'Mensaje enviado correctamente';
    } catch (Exception $e) {
        echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
    }
}
?>
