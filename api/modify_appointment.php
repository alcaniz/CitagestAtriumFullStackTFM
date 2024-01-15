<?php
include './db.php'; // Inclusión del archivo de conexión

// Establece las cabeceras para CORS y tipo de contenido
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Obtiene el cuerpo de la solicitud y lo convierte en un objeto PHP
$inputJSON = file_get_contents('php://input');
$_POST = json_decode($inputJSON, TRUE); // Convierte a un array asociativo

if (isset($_POST['id'])) {
    // Obtener los datos del array asociativo
    $id = $conn->real_escape_string($_POST['id']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $hora = $conn->real_escape_string($_POST['hora']);

    // Preparar la sentencia SQL
    $stmt = $conn->prepare("UPDATE citas SET nombre = ?, email = ?, fecha = ?, hora = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nombre, $email, $fecha, $hora, $id);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo json_encode(array("message" => "La cita ha sido actualizada."));
    } else {
        echo json_encode(array("message" => "Error al actualizar la cita: " . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array("message" => "No se ha proporcionado ID de cita."));
}

$conn->close();
?>
