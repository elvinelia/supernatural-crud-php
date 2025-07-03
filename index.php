<?php
if (!file_exists('includes/db_config.php')) {
    header('Location: instalador.php');
    exit;
}
include 'includes/db_config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Supernatural</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet" />
    <style>
        /* Navbar Styles */
        .supernatural-navbar {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.95) 0%, rgba(30, 0, 0, 0.9) 100%);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(179, 0, 0, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }
        .supernatural-navbar .navbar-brand {
            font-family: 'Cinzel Decorative', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: #dc3545 !important;
            text-shadow: 0 0 15px rgba(220, 53, 69, 0.5);
            transition: all 0.3s ease;
        }
        .supernatural-navbar .navbar-brand:hover {
            color: #ff4757 !important;
            text-shadow: 0 0 25px rgba(255, 71, 87, 0.7);
            transform: translateY(-1px);
        }
        .supernatural-navbar .nav-link {
            font-family: 'Cinzel', serif;
            font-weight: 500;
            color: #f8f9fa !important;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.7rem 1rem !important;
        }
        .supernatural-navbar .nav-link:hover {
            color: #dc3545 !important;
            transform: translateY(-2px);
        }
        .supernatural-navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #dc3545, transparent);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .supernatural-navbar .nav-link:hover::after {
            width: 80%;
        }
        .supernatural-dropdown {
            background: rgba(0, 0, 0, 0.95);
            border: 1px solid rgba(179, 0, 0, 0.3);
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
        }
        .supernatural-dropdown .dropdown-item {
            color: #f8f9fa;
            font-family: 'Cinzel', serif;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .supernatural-dropdown .dropdown-item:last-child {
            border-bottom: none;
        }
        .supernatural-dropdown .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(179, 0, 0, 0.1), rgba(179, 0, 0, 0.2));
            color: #dc3545;
            transform: translateX(5px);
        }
        .supernatural-dropdown .dropdown-item i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }
        .navbar-toggler {
            border: 1px solid rgba(179, 0, 0, 0.5);
            transition: all 0.3s ease;
        }
        .navbar-toggler:hover {
            border-color: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28220, 53, 69, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .supernatural-navbar.scrolled {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.98) 0%, rgba(30, 0, 0, 0.95) 100%);
        }

        /* Body and Carousel Styles */
        body {
            margin: 0;
            background: radial-gradient(circle at top, #000000, #111111 70%);
            font-family: 'Cinzel Decorative', serif;
            color: #fff;
            overflow-x: hidden;
        }
        #carouselBanner {
            height: 100vh;
        }
        #carouselBanner .carousel-item {
            height: 100vh;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }
        .banner-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.9));
            z-index: 5;
        }
        .banner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            text-align: center;
            color: #fff;
        }
        .banner-content h1 {
            font-family: 'Cinzel Decorative', serif;
            font-size: 4rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-shadow:
                0 0 20px rgba(220, 53, 69, 0.8),
                0 0 40px rgba(220, 53, 69, 0.6),
                3px 3px 10px rgba(0, 0, 0, 0.8);
            margin: 0;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }
        @keyframes titleGlow {
            from {
                text-shadow:
                    0 0 20px rgba(220, 53, 69, 0.8),
                    0 0 40px rgba(220, 53, 69, 0.6),
                    3px 3px 10px rgba(0, 0, 0, 0.8);
            }
            to {
                text-shadow:
                    0 0 25px rgba(255, 71, 87, 0.9),
                    0 0 50px rgba(255, 71, 87, 0.7),
                    3px 3px 15px rgba(0, 0, 0, 0.9);
            }
        }
        .banner-content .subtitle {
            font-family: 'Cinzel', serif;
            font-size: 1.2rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 1rem;
            letter-spacing: 1px;
        }
        /* Carousel controls removed intentionally */
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .banner-content h1 {
                font-size: 2.5rem;
                letter-spacing: 2px;
            }
            .banner-content .subtitle {
                font-size: 1rem;
            }
        }
        @media (max-width: 576px) {
            .banner-content h1 {
                font-size: 2rem;
                letter-spacing: 1px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar Supernatural -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top supernatural-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-tint me-2"></i>Supernatural
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav">
                <!-- Menú CRUD -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="crudDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-skull me-1"></i>Opciones
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end supernatural-dropdown" aria-labelledby="crudDropdown">
                        <li><a class="dropdown-item" href="agregar.php"><i class="fas fa-plus"></i>Crear - Agregar Personaje</a></li>
                        <li><a class="dropdown-item" href="lista.php"><i class="fas fa-eye"></i>Leer - Lista de Personajes</a></li>
                        <li><a class="dropdown-item" href="editar.php?id=1"><i class="fas fa-edit"></i>Actualizar - Editar Personaje</a></li>
                        <li><a class="dropdown-item" href="eliminar.php"><i class="fas fa-trash"></i>Eliminar - Borrar Personaje</a></li>

                    </ul>
                </li>
                <!-- Acerca -->
                <li class="nav-item">
                    <a class="nav-link" href="acerca.php"><i class="fas fa-user me-1"></i>Acerca del Estudiante</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Carrusel -->
<div id="carouselBanner" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url('img/super1.webp');">
      <div class="banner-overlay"></div>
    </div>
    <div class="carousel-item" style="background-image: url('img/super2.avif');">
      <div class="banner-overlay"></div>
    </div>
    <div class="carousel-item" style="background-image: url('img/super3.jpg');">
      <div class="banner-overlay"></div>
    </div>
    <div class="carousel-item" style="background-image: url('img/super4.jpg');">
      <div class="banner-overlay"></div>
    </div>
  </div>

  <!-- No hay botones de control -->

  <!-- Título -->
  <div class="banner-content">
    <h1>Supernatural</h1>
    <p class="subtitle">Explora lo desconocido con los Winchester</p>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.supernatural-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Pausar carrusel al hacer hover
    const carousel = document.querySelector('#carouselBanner');
    carousel.addEventListener('mouseenter', () => {
        bootstrap.Carousel.getInstance(carousel).pause();
    });
    carousel.addEventListener('mouseleave', () => {
        bootstrap.Carousel.getInstance(carousel).cycle();
    });
</script>

</body>
</html>
