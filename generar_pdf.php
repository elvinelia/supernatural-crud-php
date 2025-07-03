<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

include 'includes/db_config.php';

// Si NO viene el id, mostramos la lista para seleccionar
if (!isset($_GET['id'])) {
    // Consultar personajes
    $result = $conn->query("SELECT id, nombre FROM personajes ORDER BY nombre");

    if ($result->num_rows === 0) {
        echo "<p class='text-white'>No hay personajes registrados.</p>";
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Seleccionar Personaje para PDF</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    </head>
    <body class="bg-dark text-light p-4">
        <div class="container">
            <h1 class="mb-4 text-danger"><i class="fas fa-file-pdf"></i> Imprimir Perfil de Personaje</h1>
            <p>Haz clic en el botón para generar el PDF del personaje:</p>
            <ul class="list-group">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($row['nombre']); ?>
                        <a href="generar_pdf.php?id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> Generar PDF
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <a href="index.php" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left"></i> Volver al Inicio</a>
        </div>
    </body>
    </html>
    <?php
    exit; // terminar aquí si no hay id
}

// Si llega id, generamos el PDF
$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM personajes WHERE id = $id");

if ($result->num_rows === 0) {
    die("Error: Personaje no encontrado.");
}

$row = $result->fetch_assoc();

$imgHtml = (!empty($row['foto']))
    ? '<p><strong>Foto:</strong><br><img src="' . htmlspecialchars($row['foto']) . '" width="200"></p>'
    : '<p><strong>Foto:</strong> Imagen no disponible</p>';

// Limpiar nombre para archivo
$nombreArchivo = preg_replace('/[^A-Za-z0-9_-]/', '_', $row['nombre']);

$html = '
    <h1 style="text-align:center; color:#dc3545;">Perfil del Personaje</h1>
    <hr>
    <p><strong>Nombre:</strong> ' . htmlspecialchars($row['nombre']) . '</p>
    <p><strong>Color:</strong> ' . htmlspecialchars($row['color']) . '</p>
    <p><strong>Tipo:</strong> ' . htmlspecialchars($row['tipo']) . '</p>
    <p><strong>Nivel:</strong> ' . htmlspecialchars($row['nivel']) . '</p>
    ' . $imgHtml . '
';

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setIsRemoteEnabled(true);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("personaje_{$nombreArchivo}.pdf", ["Attachment" => false]);
exit;
