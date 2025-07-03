<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acerca de</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap');

    body {
      background-color: #0d0d0d;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 50px 20px;
      background-image: url('img/bg-supernatural.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      backdrop-filter: brightness(0.5);
    }

    h2 {
      font-family: 'Cinzel Decorative', serif;
      color: #cccccc;
      margin-bottom: 30px;
      font-size: 2.8rem;
      text-shadow: 1px 1px 3px #000;
    }

    .custom-back-btn {
      display: inline-block;
      background-color: rgba(20, 20, 20, 0.6);
      color: #ccc;
      border: 1px solid #b30000;
      padding: 10px 22px;
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.2);
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .custom-back-btn:hover {
      background-color: #b30000;
      color: #fff;
      box-shadow: 0 0 15px #ff1a1a;
      transform: scale(1.05);
    }

    .rounded-circle {
      border: 2px solid #444;
      box-shadow: 0 0 8px rgba(255, 0, 0, 0.4);
    }

    .info-box {
      background-color: rgba(10, 10, 10, 0.85);
      border: 1px solid #2c2c2c;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.6);
      max-width: 700px;
      margin: auto;
    }

    iframe {
      border-radius: 8px;
      border: none;
      width: 100%;
      max-width: 560px;
      height: 315px;
      box-shadow: 0 0 20px rgba(100,0,0,0.5);
    }

    footer {
      margin-top: 40px;
      text-align: center;
      color: #777;
      font-size: 0.9rem;
      font-family: 'Cinzel Decorative', serif;
    }
  </style>
</head>
<body>

  <!-- Botón de regreso estilizado -->
  <div class="text-start mb-4">
    <a href="index.php" class="custom-back-btn"> Volver</a>
  </div>

  <div class="info-box text-center">
    <h2>Acerca del Estudiante</h2>
    <img src="img/ft 2x2.jpg" width="140" class="rounded-circle mb-3">
    <p><strong>Nombre:</strong> Elvin Elias Vinicio Lugo</p>
    <p><strong>Matrícula:</strong> 2024-1026</p>

    <h5 class="mt-4 text-light">Video de la Tarea 2</h5>
    <div class="d-flex justify-content-center">
      <iframe src="https://www.youtube.com/embed/4RswcerxOT8" allowfullscreen></iframe>
    </div>
  </div>

  <footer>
    <p>Desarrollado para Tarea 6 &mdash; Inspirado en la serie Supernatural</p>
  </footer>

</body>
</html>
