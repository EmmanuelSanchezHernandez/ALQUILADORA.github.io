<?php
$nombre = $_POST['nombreC'];
$mail = $_POST['correoC'];
$telefono = $_POST['telefonoC'];
$asunto = $_POST['asuntoC'];
$empresa = $_POST['mensajeC'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Teléfono: " . $_POST['telefonoC'] . " \r\n";
$mensaje .= "Asunto: " . $asunto . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensajeC'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'alquiladorakarina-negocios@outlook.com';
$asunto = 'Contacto';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:index.html");
?>