<?php
	// get_appointment.php

	include './db.php'; // Incluye tu archivo de conexión a la base de datos

	// Establece las cabeceras para CORS y tipo de contenido
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Content-Type');


	if (isset($_GET['appointment_id'])) {
		$id = $conn->real_escape_string($_GET['appointment_id']);

		$sql = "SELECT * FROM citas WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$appointment = $result->fetch_assoc();
			echo json_encode(['success' => true, 'appointment' => $appointment]);
		} else {
			echo json_encode(['success' => false, 'message' => 'Cita no encontrada']);
		}

		$stmt->close();
	} else {
		echo json_encode(['success' => false, 'message' => 'ID de cita no proporcionado']);
	}

	$conn->close();
?>