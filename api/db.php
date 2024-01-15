<?php
$servername = "localhost";
$username = "root"; // reemplaza con tu nombre de usuario de MySQL
$password = ""; // reemplaza con tu contraseña de MySQL
$dbname = "citagest";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequear la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  //echo "¡Conexión exitosa!";
}
?>
