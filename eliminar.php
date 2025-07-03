<?php
include 'includes/db_config.php';

// Si viene un ID por GET, hacemos el delete
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM personajes WHERE id=$id");
    header("Location: eliminar.php");
    exit;
}

$resultado = $conn->query("SELECT * FROM personajes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Personaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0a0a0a, #1a1a1a);
            color: #f8f9fa;
            font-family: 'Cinzel Decorative', serif;
            padding: 40px 20px;
        }

        h2 {
            color: #dc3545;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            background-color: #111;
            border: 2px solid #dc3545;
            box-shadow: 0 0 15px rgba(220, 53, 69, 0.4);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table img {
            border-radius: 8px;
            width: 100px;
            height: 80px;
            object-fit: cover;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
        }

        .btn-danger {
            background-color: #c82333;
            border: none;
        }

        .btn-danger:hover {
            background-color: #e3342f;
        }

        .btn-secondary {
            background-color: #444;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #666;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            border-radius: 12px;
        }

        .icon-demon {
            color: #ff0000;
            margin-right: 10px;
            text-shadow: 0 0 8px red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-skull-crossbones icon-demon"></i> Eliminar Personaje</h2>

    <?php if ($resultado->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-dark table-bordered table-hover align-middle text-center">
                <thead class="table-danger">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Nivel</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($row['foto']) ?>" alt="Foto"></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['tipo']) ?></td>
                            <td><?= htmlspecialchars($row['nivel']) ?></td>
                            <td>
                                <a href="eliminar.php?id=<?= $row['id'] ?>" 
                                   onclick="return confirm('¿Seguro que deseas eliminar a <?= htmlspecialchars($row['nombre']) ?>?');"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center">No hay personajes registrados.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver al menú
        </a>
    </div>
</div>

</body>
</html>
