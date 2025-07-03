<?php
include 'includes/db_config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$mostrarFormulario = false;
$row = null;

if ($id) {
    $resultado = $conn->query("SELECT * FROM personajes WHERE id = $id");
    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $mostrarFormulario = true;
    } else {
        echo "<script>alert('Personaje no encontrado'); window.location.href='editar.php';</script>";
        exit;
    }

    if (isset($_POST['actualizar'])) {
        $nombre = $_POST['nombre'];
        $color = $_POST['color'];
        $tipo = $_POST['tipo'];
        $nivel = intval($_POST['nivel']);
        $foto = $_POST['foto'];

        $sql = "UPDATE personajes SET nombre='$nombre', color='$color', tipo='$tipo', nivel=$nivel, foto='$foto' WHERE id=$id";
        if ($conn->query($sql)) {
            echo "<script>alert('Personaje actualizado correctamente'); window.location.href='editar.php';</script>";
            exit;
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }
}

$personajes = $conn->query("SELECT id, nombre FROM personajes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Editar Personaje - Supernatural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #0a0a0a, #1a1a1a);
      font-family: 'Cinzel Decorative', serif;
      color: #f8f9fa;
      padding: 40px 15px;
    }

    .container {
      max-width: 600px;
      background: #111;
      border: 2px solid #dc3545;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(220, 53, 69, 0.4);
    }

    h2 {
      text-align: center;
      color: #dc3545;
      margin-bottom: 25px;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
    }

    label, input {
      font-size: 1.1rem;
    }

    input.form-control {
      background-color: #222;
      border: 1px solid #dc3545;
      color: #f8f9fa;
    }

    input.form-control:focus {
      border-color: #ff4c4c;
      box-shadow: 0 0 8px rgba(255, 0, 0, 0.6);
    }

    .btn-primary, .btn-warning, .btn-secondary {
      font-weight: bold;
      font-family: 'Cinzel Decorative', serif;
    }

    .btn-warning {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-warning:hover {
      background-color: #ff4c4c;
      border-color: #ff4c4c;
    }

    .form-select {
      background-color: #222;
      border: 1px solid #dc3545;
      color: #f8f9fa;
    }

    .form-select:focus {
      border-color: #ff4c4c;
      box-shadow: 0 0 8px rgba(255, 0, 0, 0.6);
    }

    .btn-secondary {
      background-color: #444;
      border-color: #444;
    }

    .btn-secondary:hover {
      background-color: #666;
    }

    .icon-demon {
      color: #ff0000;
      margin-right: 8px;
    }
  </style>
</head>
<body>

<div class="container">
  <?php if (!$mostrarFormulario): ?>
    <h2><i class="fas fa-cross icon-demon"></i>Seleccionar Personaje</h2>
    <form method="GET" action="editar.php">
      <div class="mb-3">
        <label for="id" class="form-label">Elige un personaje:</label>
        <select name="id" id="id" class="form-select" required>
          <option value="">-- Selecciona --</option>
          <?php while ($p = $personajes->fetch_assoc()): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nombre']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar</button>
      <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </form>

  <?php else: ?>
    <h2><i class="fas fa-fire icon-demon"></i></i></i>Editar Personaje</h2>
    <form method="POST">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?= htmlspecialchars($row['nombre']) ?>" class="form-control mb-2" required>

      <label>Color:</label>
      <input type="text" name="color" value="<?= htmlspecialchars($row['color']) ?>" class="form-control mb-2" required>

      <label>Tipo:</label>
      <input type="text" name="tipo" value="<?= htmlspecialchars($row['tipo']) ?>" class="form-control mb-2" required>

      <label>Nivel:</label>
      <input type="number" name="nivel" value="<?= htmlspecialchars($row['nivel']) ?>" class="form-control mb-2" required>

      <label for="foto">URL de la Imagen:</label>
      <input type="url" id="foto" name="foto" value="<?= htmlspecialchars($row['foto']) ?>" class="form-control mb-3" required>

      <button name="actualizar" class="btn btn-warning"><i class="fas fa-save"></i> Guardar Cambios</button>
      <a href="editar.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver a Elegir</a>
    </form>
  <?php endif; ?>
</div>

</body>
</html>
