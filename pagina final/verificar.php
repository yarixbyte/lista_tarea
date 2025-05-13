<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Crear registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear'])) {
    $titulo = htmlspecialchars($_POST['titulo']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $usuario_id = $_SESSION['usuario'];

    $query = $conexion->prepare("INSERT INTO registros (titulo, descripcion, usuario_id) VALUES (:titulo, :descripcion, :usuario_id)");
    $query->bindParam(":titulo", $titulo);
    $query->bindParam(":descripcion", $descripcion);
    $query->bindParam(":usuario_id", $usuario_id);
    $query->execute();
}

// Leer registros
$query = $conexion->prepare("SELECT * FROM registros WHERE usuario_id = :usuario_id");
$query->bindParam(":usuario_id", $_SESSION['usuario']);
$query->execute();
$registros = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Registros</h1>
        <form method="POST" action="">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>
            <button type="submit" name="crear">Crear Registro</button>
        </form>
        <h2>Mis Registros</h2>
        <ul>
            <?php foreach ($registros as $registro): ?>
                <li>
                    <strong><?php echo htmlspecialchars($registro['titulo']); ?></strong>
                    <p><?php echo htmlspecialchars($registro['descripcion']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>