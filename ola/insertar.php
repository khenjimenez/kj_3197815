<?php
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: catalogo.php");
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$precio = str_replace(',', '', $_POST['precio'] ?? '0');
$precio = floatval($precio);
$descripcion = trim($_POST['descripcion'] ?? '');
$id_tipo = !empty($_POST['id_tipo']) ? intval($_POST['id_tipo']) : null;
$nuevo_tipo = trim($_POST['nuevo_tipo'] ?? '');

// si ingresó nuevo tipo, insertar y obtener id
if ($nuevo_tipo !== '') {
    $stmtT = $conexion->prepare("INSERT INTO tipo_producto (nombre_tipo) VALUES (?)");
    $stmtT->bind_param("s", $nuevo_tipo);
    $stmtT->execute();
    $id_tipo = $conexion->insert_id;
    $stmtT->close();
}

// manejo de imagen
$uploadedName = null;
if (!empty($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['imagen'];
    $allowed = ['image/jpeg','image/png','image/jpg','image/webp'];
    if (!in_array($file['type'], $allowed)) {
        die("Tipo de imagen no permitido.");
    }
    // generar nombre único
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadedName = time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
    $dest = __DIR__ . '/uploads/' . $uploadedName;
    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        die("Error al mover la imagen.");
    }
}

// insertar producto
$stmt = $conexion->prepare("INSERT INTO producto (nombre, precio, descripcion, imagen, id_tipo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdssi", $nombre, $precio, $descripcion, $uploadedName, $id_tipo);
if ($stmt->execute()) {
    $stmt->close();
    header("Location: catalogo.php");
    exit;
} else {
    echo "Error: " . $conexion->error;
}
