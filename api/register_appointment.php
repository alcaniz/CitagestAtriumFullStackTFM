<?php
include './db.php'; // Incluye la conexión a la base de datos

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $fecha = $_POST['date'];
    $hora = $_POST['time'];

    $sql = $conn->prepare("INSERT INTO citas (nombre, email, fecha, hora) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $nombre, $email, $fecha, $hora);
    
    if ($sql->execute()) {
        $inserted_id = $conn->insert_id;
        $response['success'] = true;
        $response['message'] = "La cita ha sido creada con éxito.";
        $response['appointment_id'] = $inserted_id;

        $to = $email;
        $subject = 'Confirmación de cita';
        $message = "Hola $nombre,\nTu cita ha sido registrada para la fecha $fecha a las $hora.\n\nPara modificar tu cita sigue este enlace: http://localhost/api/modificar_cita.php?id=$inserted_id";
        $headers = 'From: no-reply@tu-dominio.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)) {
            $response['mail_status'] = "Correo de confirmación enviado.";
        } else {
            $response['mail_status'] = "Error al enviar correo.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $sql->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method";
}

echo json_encode($response);

$conn->close();
?>