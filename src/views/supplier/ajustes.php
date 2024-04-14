<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

require 'config.php'; // Asegúrate de tener un archivo config.php con la configuración de tu base de datos

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Usar manejo más seguro si es necesario
    $language = $_POST['language'];
    $notifications = isset($_POST['notifications']) ? 1 : 0;

    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    // Actualizar base de datos
    try {
        $pdo = new PDO($dsn, $db_username, $db_password); // Asumiendo que tienes variables para la conexión
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET email = ?, language = ?, notifications = ?";
        $params = [$email, $language, $notifications];

        if (!empty($password)) {
            $sql .= ", password = ?";
            $params[] = $passwordHash;
        }

        $sql .= " WHERE id = ?";
        $params[] = $_SESSION['usuario_id'];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $message = 'Cambios guardados correctamente.';
    } catch (PDOException $e) {
        $message = "Error al guardar los cambios: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ajustes de Perfil</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/ajustes.css">
</head>
<body>
    <div class="container">
        <h1>Ajustes de Perfil</h1>
        <?php if (!empty($message)): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form action="ajustes.php" method="post">
        <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña Nueva:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirmar Contraseña:</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm">
            </div>
            <div class="form-group">
                <label for="language">Idioma Preferido:</label>
                <select id="language" name="language">
                    <option value="es">Español</option>
                    <option value="en">English</option>
                    <!-- Más opciones de idioma -->
                </select>
            </div>
            <div class="form-group">
                <label for="notifications">Notificaciones:</label>
                <input type="checkbox" id="notifications" name="notifications" checked>
            </div>
            <div class="form-group">
                <button type="submit" class="save-btn">Guardar Cambios</button>
            </div>
        </form>
    </div>
</body>
</html>
