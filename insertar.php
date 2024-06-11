<?php
session_start(); // Iniciar la sesión para usar variables de sesión
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    
    // Preparar y enlazar
    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->bind_param("s", $task);
    
    // Ejecutar la declaración
    if ($stmt->execute() === TRUE) {
        $_SESSION['message'] = "Nueva tarea agregada correctamente";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['msg_type'] = "error";
    }
    
    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
    
    // Redirigir después de cerrar la conexión
    header("Location: index.php");
    exit();
}
?>