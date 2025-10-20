<?php
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: catalogo.php");
    exit;
}

$id = intval($_POST['id'] ?? 0);
$nombre = trim($_POST['nombre'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');


$precio_raw = $_POST['precio'] ?? '0';
$precio_sin_comas = str_replace(',', '', $precio_raw); 
$precio = floatval($precio_sin_comas);


if ($precio <= 0) {
    die("Precio inválido.");
}


$stmt = $conexion->prepare("UPDATE producto SET nombre = ?, precio = ?, descripcion = ? WHERE id_producto = ?");
$stmt->bind_param("sdsi", $nombre, $precio, $descripcion, $id);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: catalogo.php");
    exit;
} else {
    echo "Error al actualizar: " . $conexion->error;
}
