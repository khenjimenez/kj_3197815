<?php

require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Catálogo - Cueromanía Motors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root { --accent: #d90429; }
    body { margin:0; background:#000; color:#fff; font-family: Arial, sans-serif; }
    #video-bg { position: fixed; right:0; bottom:0; min-width:100%; min-height:100%; z-index:-2; filter: brightness(0.55); object-fit: cover; }
    .overlay { position:relative; z-index:2; }
    .catalog-wrap { min-height:100vh; padding-top:100px; padding-bottom:60px; }
    .cards-container { max-width:1100px; margin:0 auto; backdrop-filter: blur(4px); padding:20px; box-shadow:0 10px 30px rgba(0,0,0,0.6); }
    .card { background:rgba(0,0,0,0.55); border: 2px solid rgba(217,4,41,0.15); color:#fff; }
    .card img { width:100%; height:250px; object-fit:cover; border-radius:6px 6px 0 0; }
    .btn-add { background:var(--accent); color:#fff; font-weight:bold; border:none; padding:8px 12px; border-radius:6px; }
    footer { text-align:center; margin-top:30px; color:#bbb; font-size:14px; }
    .card-body { padding:12px; }
  </style>
</head>
<body>
    
  <video id="video-bg" autoplay muted loop>
    <source src="formula1.mp4" type="video/mp4">
  </video>

  <main class="overlay catalog-wrap">
    <div class="container cards-container">
        <a href="index.php" class="btn btn-outline-light mb-3">← Volver al Inicio</a>


      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0">Catálogo Ferrari 2025</h3>
        <a href="agregar.php" class="btn btn-add">+ Agregar Auto</a>
      </div>

      <div class="row g-4">
        <?php
        
        $sql = "SELECT p.id_producto, p.nombre, p.precio, p.descripcion, p.imagen, t.nombre_tipo
                FROM producto p
                LEFT JOIN tipo_producto t ON p.id_tipo = t.id_tipo
                ORDER BY p.id_producto DESC";
        $res = $conexion->query($sql);
        if ($res && $res->num_rows > 0):
            while ($row = $res->fetch_assoc()):
                $imgPath = !empty($row['imagen']) && file_exists(__DIR__ . '/uploads/' . $row['imagen']) ? 'uploads/' . $row['imagen'] : 'formula1.jpg';
        ?>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="<?=htmlspecialchars($imgPath)?>" alt="<?=htmlspecialchars($row['nombre'])?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?=htmlspecialchars($row['nombre'])?></h5>
              <p class="card-text text-truncate" style="max-height:3.6em;"><?=nl2br(htmlspecialchars($row['descripcion']))?></p>
              <p class="mt-auto"><strong class="me-2"><?= isset($row['nombre_tipo']) ? htmlspecialchars($row['nombre_tipo']) : '' ?></strong>
                <span class="badge bg-danger"><?= number_format($row['precio'], 2, ',', '.') ?> COP</span>
              </p>
              <div class="d-flex justify-content-between">
                <a href="detalle.php?id=<?= $row['id_producto'] ?>" class="btn btn-outline-light btn-sm">Detalles</a>
                <div>
                  <a href="editar.php?id=<?= $row['id_producto'] ?>" class="btn btn-outline-warning btn-sm">Modificar</a>
                  <a href="eliminar.php?id=<?= $row['id_producto'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">Borrar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            endwhile;
        else:
        ?>
        <div class="col-12">
          <div class="alert alert-light text-dark">No hay productos aún. Usa "+ Agregar Auto" para crear uno.</div>
        </div>
        <?php endif; ?>
      </div>

      <footer>© 2025 Cueromanía Motors</footer>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
