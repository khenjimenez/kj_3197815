<?php
$host = "localhost";
$user = "root"; // predeterminado en XAMPP
$pass = ""; // sin contraseña por defecto
$db   = "ferrari_db";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// echo "Conexión exitosa"; // puedes probar activándolo si quieres
?>