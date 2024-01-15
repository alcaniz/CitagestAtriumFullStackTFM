<?php
include './db.php'; // Incluye la conexión a la base de datos

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = [];

$sql = "SELECT id, nombre, email, fecha, hora FROM citas ORDER BY fecha, hora ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode(['success' => true, 'appointments' => $response]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay citas registradas']);
}

$conn->close();
?>