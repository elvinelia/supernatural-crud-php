<?php
include 'includes/db_config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lista de Personajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #0a0a0a, #1a1a1a);
      color: #f8f9fa;
      font-family: 'Cinzel Decorative', serif;
      padding: 60px 15px;
    }
    h2 {
      color: #dc3545;
      text-align: center;
      margin-bottom: 40px;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
    }

    /* Contenedor general */
    .cards-container {
      max-width: 1100px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
      justify-content: center;
    }

    /* Tarjeta individual */
    .card-personaje {
      background: #111;
      border: 2px solid #dc3545;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(220, 53, 69, 0.5);
      overflow: hidden;
      width: 350px;
      display: flex;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-personaje:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 30px rgba(255, 0, 0, 0.9);
    }

    /* Foto */
    .card-personaje img {
      width: 130px;
      object-fit: cover;
      border-right: 2px solid #dc3545;
      transition: filter 0.3s ease;
    }
    .card-personaje:hover img {
      filter: brightness(1.2);
    }

    /* Información */
    .card-info {
      padding: 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .card-info h3 {
      margin: 0 0 12px;
      font-size: 1.6rem;
      color: #ff4c4c;
      text-shadow: 0 0 8px rgba(255, 72, 72, 0.8);
    }
    .card-info p {
      margin: 3px 0;
      font-size: 1.1rem;
      color: #f8f9fa;
    }
    .card-info p span {
      font-weight: 700;
      color: #dc3545;
    }

    /* Botón de imprimir PDF */
    .btn-pdf {
      margin-top: 15px;
      align-self: flex-start;
      background-color: #dc3545;
      border: none;
      color: white;
      font-weight: 600;
      padding: 7px 15px;
      border-radius: 6px;
      transition: background-color 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-pdf:hover {
      background-color: #ff6767;
      text-decoration: none;
      color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .card-personaje {
        width: 100%;
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      .card-personaje img {
        width: 100%;
        border-right: none;
        border-bottom: 2px solid #dc3545;
      }
      .card-info {
        padding: 15px 10px;
      }
      .btn-pdf {
        align-self: center;
      }
    }
  </style>
</head>
<body>

<h2><i class="fas fa-skull-crossbones"></i> Lista de Personajes</h2>

<div class="cards-container">
<?php
$sql = "SELECT * FROM personajes ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($personaje = $result->fetch_assoc()) {
        ?>
        <div class="card-personaje" tabindex="0" role="button" aria-label="Personaje <?php echo htmlspecialchars($personaje['nombre']); ?>">
            <img src="<?php echo htmlspecialchars($personaje['foto']); ?>" alt="Foto de <?php echo htmlspecialchars($personaje['nombre']); ?>" />
            <div class="card-info">
                <h3><?php echo htmlspecialchars($personaje['nombre']); ?></h3>
                <p><span>Color:</span> <?php echo htmlspecialchars($personaje['color']); ?></p>
                <p><span>Tipo:</span> <?php echo htmlspecialchars($personaje['tipo']); ?></p>
                <p><span>ID:</span> <?php echo htmlspecialchars($personaje['id']); ?></p>
                <p><span>Nivel:</span> <?php echo htmlspecialchars($personaje['nivel']); ?></p>
                <a href="generar_pdf.php?id=<?php echo $personaje['id']; ?>" target="_blank" class="btn-pdf">
        <i class="fas fa-file-pdf"></i> Imprimir PDF
    </a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No hay personajes registrados.</p>";
}
?>
</div>

<div class="text-center mt-5">
  <a href="index.php" class="btn btn-danger btn-lg" style="font-family: 'Cinzel Decorative', serif;">
    <i class="fas fa-arrow-left"></i> Volver
  </a>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
