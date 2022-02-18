<?php

$direccionIP = $_POST['ip'];
$port = $_POST['port'];
$mensaje = $_POST['mensaje'];
// Obtenemos la ip del host de www.example.com
$direccion = gethostbyname($direccionIP);
// Creamos la conexión socket:
$cliente = stream_socket_client("tcp://$direccion:$port", $errno, $errorMessage);
if ($cliente === false) {
    throw new UnexpectedValueException("Failed to connect: $errorMessage");
}
// Escribimos en el socket la petición HTTP:
fwrite($cliente, $mensaje);
echo stream_get_contents($cliente);
fclose($cliente);