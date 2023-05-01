<?php
// detalles de conexión
$servername = "localhost";
$username = "root";
$password = "laresrangel";
$dbname = "seguridad";

// crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";

// cerrar conexión
$conn->close();
?>