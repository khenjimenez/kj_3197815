<?php
require_once "conexion.php";

$id = intval($_GET['id'] ?? 0);

$result = $conexion->query("SELECT * FROM producto WHERE id_producto = $id");
$producto = $result->fetch_assoc();

if (!$producto) {
    die("Producto no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar Auto - Cueromanía</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #111; color: #fff; font-family: Arial; }
    .container { max-width: 800px; margin-top: 60px; }
    .btn-primary { background-color: #d90429; border: none; }
  </style>
</head>
<body>
  <div class="container">
    <a href="catalogo.php" class="btn btn-light mb-3">← Volver al Catálogo</a>
    <div class="card bg-dark text-white p-4">
      <h4>Editar Auto</h4>
      <form method="POST" action="actualizar.php">
        <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">

        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input required name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Precio (ej: 1000000.00)</label>
          <input required name="precio" type="number" step="0.01" value="<?= $producto['precio'] ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea name="descripcion" rows="4" class="form-control"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        </div>

        <button class="btn btn-primary">Guardar Cambios</button>
      </form>
    </div>
  </div>
</body>
</html>
