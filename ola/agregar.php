<?php
// agregar.php - formulario para agregar producto
require_once "conexion.php";

// Traer tipos para el select
$tipos = [];
$r = $conexion->query("SELECT id_tipo, nombre_tipo FROM tipo_producto ORDER BY nombre_tipo");
if ($r) {
    while ($t = $r->fetch_assoc()) $tipos[] = $t;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Agregar Auto - Cueromanía</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style> body { background:#111; color:#fff; font-family:Arial; } .form-wrap { max-width:820px; margin:80px auto; } .btn-primary{background:#d90429;border:none;} </style>
</head>
<body>
  <div class="container form-wrap">
    <a href="catalogo.php" class="btn btn-light mb-3">← Volver al Catálogo</a>
    <div class="card bg-dark text-white p-4">
      <h4>Agregar Auto</h4>
      <form action="insertar.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input required name="nombre" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">Precio (ej: 350000)</label>
          <input required name="precio" type="number" step="0.01" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea name="descripcion" rows="4" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Tipo (elige o escribe uno nuevo)</label>
          <select name="id_tipo" class="form-select mb-2">
            <option value="">-- Seleccionar tipo --</option>
            <?php foreach($tipos as $t): ?>
              <option value="<?= $t['id_tipo'] ?>"><?= htmlspecialchars($t['nombre_tipo']) ?></option>
            <?php endforeach; ?>
          </select>
          <input name="nuevo_tipo" class="form-control" placeholder="Si no está, escribe un nuevo tipo aquí (opcional)"/>
        </div>
        <div class="mb-3">
          <label class="form-label">Imagen (jpg, png)</label>
          <input required name="imagen" type="file" accept="image/*" class="form-control" />
        </div>
        <button class="btn btn-primary">Guardar Auto</button>
      </form>
    </div>
  </div>
</body>
</html>
