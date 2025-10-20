<?php
require_once "conexion.php";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) { header("Location: catalogo.php"); exit; }

// obtener imagen para eliminar
$stmt = $conexion->prepare("SELECT imagen FROM producto WHERE id_producto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();

if ($row && !empty($row['imagen']) && file_exists(__DIR__ . '/uploads/' . $row['imagen'])) {
    @unlink(__DIR__ . '/uploads/' . $row['imagen']);
}

// borrar registro
$stmt2 = $conexion->prepare("DELETE FROM producto WHERE id_producto = ?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->close();

header("Location: catalogo.php");
exit;
