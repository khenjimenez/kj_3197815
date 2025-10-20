<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Venta de Carros - Cueromanía Motors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   
    #video-container { position: relative; width: 100%; height: 100vh; overflow: hidden; }
    #video-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; }

    header { position: relative;
       z-index: 1;
        color: white;
         text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
          padding-top: 200px; padding-bottom: 200px;
           text-align: center; }



    body { margin: 0; padding: 0; overflow-x: hidden; font-family: Arial, sans-serif; background-color: #ffffff; }
    .content-section { position: relative; z-index: 2; padding-top: 60px; padding-bottom: 60px; }
    .about-section { position: relative; overflow: hidden; color: #fff; border-top: 5px solid #d90429; border-bottom: 5px solid #d90429; padding: 80px 0; }
    .about-section video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; }
    .about-section h2 { color: #d90429; font-weight: bold; position: relative; z-index: 2; }
    .about-section p { max-width: 700px; margin: 0 auto; color: #eee; position: relative; z-index: 2; }
    .card { border: none; background-color: rgba(24,24,24,0.45); color: #fff; border-top: 5px solid #d90429; transition: all 0.3s ease; backdrop-filter: blur(3px); box-shadow: 0 0 15px rgba(217,4,41,0.3); }
    .card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(217,4,41,0.6); }
    .card-title { color: #d90429; font-weight: bold; }
    .carousel-container { position: relative; overflow: hidden; border-top: 5px solid #d90429; border-bottom: 5px solid #d90429; background-color: #000; }
    .carousel-inner { height: 540px; border-radius: 10px; }
    .carousel-inner img { height: 100%; width: 100%; object-fit: cover; object-position: center 65%; border-radius: 10px; transition: transform 6s ease-in-out; }
    .carousel-item.active img { transform: scale(1.05); }
    .navbar { z-index: 10; }
    .navbar-brand { font-weight: bold; font-size: 1.3rem; }
    footer { background-color: #111; }
    .text-red { color: #d90429; }
  </style>
</head>
<body>

 
  <nav class="navbar bg-dark navbar-dark fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <a class="navbar-brand" href="#">🚗 Cueromanía Motors</a>
      <a class="btn btn-outline-light btn-sm mt-3" href="login.html">Iniciar Sesión</a>

      <ul class="navbar-nav flex-row">
        <li class="nav-item"><a class="nav-link text-light mx-2" href="index.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link text-light mx-2" href="catalogo.php">Catálogo</a></li>
        <li class="nav-item"><a class="nav-link text-light mx-2" href="#">Contacto</a></li>
      </ul>
      <a href="login.html">
        <img src="formula1.jpg" alt="usuario" width="40" height="40" class="rounded-circle">
      </a>
    </div>
  </nav>

 
  <div id="video-container">
    <video id="video-bg" autoplay muted loop playsinline preload="auto">
      <source src="formula1.mp4" type="video/mp4">
      Tu navegador no soporta el elemento de video.
    </video>

    <header>
      <h1 class="display-4 fw-bold">Encuentra tu próximo carro</h1>
      <p class="lead">Los mejores precios y modelos en un solo lugar</p>
      <a class="btn btn-danger btn-lg" href="catalogo.php">Ver Catálogo</a>
    </header>
  </div>

  <!-- Carrusel y demás (lo dejé igual) -->
  <section class="carousel-container content-section">
    <div class="container text-center">
      <h2 class="text-center mb-4 fw-bold text-red">Galería Ferrari</h2>
      <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow">
          <div class="carousel-item active">
            <img src="formula1.jpg" class="d-block w-100" alt="Auto 1">
          </div>
          <div class="carousel-item">
            <img src="laf.jpg" class="d-block w-100" alt="Auto 2">
          </div>
          <div class="carousel-item">
            <img src="laf1.jpg" class="d-block w-100" alt="Auto 3">
          </div>
          <div class="carousel-item">
            <img src="laf2.jpg" class="d-block w-100" alt="Auto 4">
          </div>
          <div class="carousel-item">
            <img src="laf3.jpg" class="d-block w-100" alt="Auto 5">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </section>

  <!-- Sobre Nosotros -->
  <section class="about-section text-center">
    <video autoplay muted loop playsinline preload="auto">
      <source src="ferrari.mp4" type="video/mp4">
      Tu navegador no soporta el elemento de video.
    </video>

    <div class="container position-relative">
      <h2 class="mb-4">Sobre Ferrari</h2>
      <p class="mb-5">
        En <strong class="text-red">Cueromanía Motors</strong> nos inspiramos en la historia y excelencia de Ferrari, una marca que representa velocidad, lujo y perfección en cada detalle.
      </p>

      <div class="row text-center mt-5">
        <div class="col-md-3 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Nuestra Misión</h5>
              <p class="card-text">
                Inspirar a nuestros clientes con vehículos que reflejen la potencia, precisión y elegancia de Ferrari.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Nuestra Visión</h5>
              <p class="card-text">
                Convertirnos en el referente nacional de autos deportivos de lujo, combinando tecnología y pasión automotriz.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Nuestros Valores</h5>
              <p class="card-text">
                Excelencia, innovación, rendimiento y respeto por la herencia automotriz italiana.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Nuestra Inspiración</h5>
              <p class="card-text">
                Ferrari representa el arte de la velocidad. Su legado impulsa nuestra pasión por brindar experiencias únicas al volante.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="text-light text-center p-3">
    © 2025 Cueromanía Motors - Inspirado en Ferrari
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
