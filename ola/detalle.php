<?php
require_once "conexion.php";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) { header("Location: catalogo.php"); exit; }

$stmt = $conexion->prepare("SELECT p.*, t.nombre_tipo FROM producto p LEFT JOIN tipo_producto t ON p.id_tipo = t.id_tipo WHERE p.id_producto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$prod = $res->fetch_assoc();
$stmt->close();

if (!$prod) { header("Location: catalogo.php"); exit; }

$imgPath = !empty($prod['imagen']) && file_exists(__DIR__ . '/uploads/' . $prod['imagen']) ? 'uploads/' . $prod['imagen'] : 'formula1.jpg';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Detalle - <?= htmlspecialchars($prod['nombre']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style> body { background:#111; color:#fff; font-family:Arial; } .wrap{ max-width:900px;margin:40px auto;} .btn-primary{background:#d90429;border:none;} </style>
</head>
<body>
  <div class="container wrap">
    <a href="catalogo.php" class="btn btn-light mb-3">← Volver al catálogo</a>
    <div class="card bg-dark text-white">
      <img src="<?=htmlspecialchars($imgPath)?>" class="card-img-top" style="height:420px;object-fit:cover" alt="">
      <div class="card-body">
        <h3><?=htmlspecialchars($prod['nombre'])?></h3>
        <p><strong>Tipo:</strong> <?= htmlspecialchars($prod['nombre_tipo'] ?? '') ?></p>
        <p><strong>Precio:</strong> <?= number_format($prod['precio'], 2, ',', '.') ?> COP</p>
        <p><?= nl2br(htmlspecialchars($prod['descripcion'])) ?></p>
        <div class="mt-3">
          <a href="editar.php?id=<?= $prod['id_producto'] ?>" class="btn btn-warning">Modificar</a>
          <a href="eliminar.php?id=<?= $prod['id_producto'] ?>" class="btn btn-danger" onclick="return confirm('¿Eliminar este producto?')">Borrar</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
