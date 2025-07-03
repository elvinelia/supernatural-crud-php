<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $dbname = $_POST['dbname'];

    // Conectar sin seleccionar base de datos
    $conn = new mysqli($host, $user, $pass);

    if ($conn->connect_error) {
        $error = "Error de conexión: " . $conn->connect_error;
    } else {
        // Crear la base de datos si no existe
        $conn->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
        $conn->select_db($dbname);

        // Crear la tabla personajes si no existe
        $sql = "CREATE TABLE IF NOT EXISTS personajes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100),
            color VARCHAR(50),
            tipo VARCHAR(50),
            nivel INT,
            foto VARCHAR(255)
        )";

        if ($conn->query($sql)) {
            // Crear archivo db_config.php
            $config = "<?php\n";
            $config .= "define('DB_HOST', '$host');\n";
            $config .= "define('DB_USER', '$user');\n";
            $config .= "define('DB_PASS', '$pass');\n";
            $config .= "define('DB_NAME', '$dbname');\n";
            $config .= "\$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);\n";
            $config .= "if (\$conn->connect_error) { die('Error de conexión: ' . \$conn->connect_error); }\n";
            $config .= "?>";

            if (!is_dir('includes')) {
                mkdir('includes', 0755);
            }

            file_put_contents('includes/db_config.php', $config);
            header("Location: index.php");
            exit;
        } else {
            $error = "No se pudo crear la tabla: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asistente de Instalación - Supernatural</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4">⚙️ Asistente de Configuración</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Servidor (host)</label>
                <input type="text" name="host" class="form-control" required value="localhost">
            </div>
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="user" class="form-control" required value="root">
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nombre de la Base de Datos</label>
                <input type="text" name="dbname" class="form-control" required value="supernatural_db">
            </div>
            <button type="submit" class="btn btn-success">Crear y Conectar</button>
        </form>
    </div>
</body>
</html>
