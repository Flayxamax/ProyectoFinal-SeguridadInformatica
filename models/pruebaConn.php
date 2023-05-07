<?php
// Incluye el archivo Conn.php
require_once '../models/Conn.php';

// Obtiene la instancia única de la clase Conn
$conn = Conn::getInstance();

// Intenta obtener la conexión a la base de datos
$mysqli = $conn->getConnection();

// Verifica si hubo un error al conectarse a la base de datos
if ($mysqli->connect_errno) {
    echo "Falló la conexión a la base de datos: " . $mysqli->connect_error;
} else {
    echo "Conexión a la base de datos exitosa";
}

// Cierra la conexión a la base de datos
$mysqli->close();
?>
