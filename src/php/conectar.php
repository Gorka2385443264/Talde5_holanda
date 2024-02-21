<?php
$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "talde5";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM talde5.biltegia";
$result = $conn->query($sql);

// Verificar la ejecución de la consulta
if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Resto del código
