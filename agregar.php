<?php
include 'includes/db_config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Personaje - Supernatural</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #0a0a0a, #1a1a1a);
      color: #f8f9fa;
      font-family: 'Cinzel Decorative', serif;
      min-height: 100vh;
      padding-top: 60px;
    }

    .super-container {
      background-color: #111;
      border: 1px solid #dc3545;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.2);
      padding: 30px;
      max-width: 700px;
      margin: auto;
    }

    h2 {
      color: #dc3545;
      text-align: center;
      margin-bottom: 30px;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.4);
    }

    label {
      font-weight: bold;
      color: #ccc;
    }

    .form-control {
      background-color: #222;
      color: #f8f9fa;
      border: 1px solid #dc3545;
    }

    .form-control:focus {
      background-color: #222;
      color: #fff;
      border-color: #ff0000;
      box-shadow: 0 0 8px #ff0000;
    }

    .btn-success {
      background-color: #b30000;
      border: none;
      font-weight: bold;
    }

    .btn-success:hover {
      background-color: #ff1a1a;
      box-shadow: 0 0 10px #ff1a1a;
    }

    .btn-secondary {
      background-color: #333;
      border: none;
    }

    .btn-secondary:hover {
      background-color: #555;
    }

    footer {
      text-align: center;
      color: #999;
      margin-top: 50px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<div class="super-container">
<h2>
<i class="fas fa-sun" style="color: #dc3545; position: relative;">
  <i class="fas fa-star" style="position: absolute; top: 2px; left: 5px; font-size: 0.5em;"></i>
</i>
  Agregar Personaje
</h2>

  <form action="" method="POST">
    <div class="mb-3">
      <label>Nombre:</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Color Representativo:</label>
      <input type="text" name="color" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tipo / Rol:</label>
      <input type="text" name="tipo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nivel:</label>
      <input type="text" name="nivel" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>URL de la Foto:</label>
      <input type="url" name="foto" class="form-control" required placeholder="https://...">
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
      <button type="submit" name="guardar" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
      <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>
  </form>

  <?php
  if (isset($_POST['guardar'])) {
      $nombre = $_POST['nombre'];
      $color = $_POST['color'];
      $tipo = $_POST['tipo'];
      $nivel = $_POST['nivel'];
      $foto = $_POST['foto']; // ahora es una URL

      $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto)
              VALUES ('$nombre', '$color', '$tipo', $nivel, '$foto')";

      if ($conn->query($sql)) {
          echo "<div class='alert alert-success mt-4'>Personaje agregado con éxito. Redirigiendo...</div>";
          echo "<script>setTimeout(() => window.location='index.php', 2000);</script>";
      } else {
          echo "<div class='alert alert-danger mt-4'>Error: " . $conn->error . "</div>";
      }
  }
  ?>
</div>

<footer>
  <p>Supernatural</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
