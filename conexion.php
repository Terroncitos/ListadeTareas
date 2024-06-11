<?php
$servername = "localhost";
$username = "id22212508_azucares";
$password = "Azul123-";
$dbname = "id22212508_todo_list";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}
?>