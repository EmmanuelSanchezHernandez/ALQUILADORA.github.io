<?php
include_once 'conexion.php';
$nombreEvento = $_GET['nombreEvento'];
$fecha = $_GET['fecha'];
$direccion = $_GET['direccion'];

    $query = "INSERT INTO eventos (nombre, fecha) VALUES ('$nombreEvento', '$fecha');";

    if ($conn->query($query) === TRUE) {
        $lastId = $conn->insert_id; 
         //Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
            header('Content-Type: application/json');
            //Guardamos los datos en un array
            $datos = array(
            'estado' => 'ok',
            'nombreEvento' => $nombreEvento, 
            'fecha' => $fecha,
            'id' => $lastId,
            );
            //Devolvemos el array pasado a JSON como objeto
            $query = "INSERT INTO descripcionEventos (id_evento) VALUES ($lastId) ON DUPLICATE KEY UPDATE direccion=$direccion";
            echo json_encode($datos, JSON_FORCE_OBJECT);
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $conn->close();
?>