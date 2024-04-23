<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

echo "Usuario: " . $_SESSION['nombre_usuario']; // Verifica que se muestre correctamente

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Usar manejo más seguro si es necesario
    $language = $_POST['language'];
    $notifications = isset($_POST['notifications']) ? 1 : 0;
    $passwordHash = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

    // Cargar el archivo XML
    $xml = simplexml_load_file('user_config.xml');
    $user = $xml->xpath("/users/user[@id='{$_SESSION['nombre_usuario']}']")[0];

    // Actualizar los datos del usuario
    if ($user) {
        $user->$email = $email;
        $user->$language = $language;
        $user->$notifications = $notifications;
        if ($passwordHash) {
            $user->$password = $passwordHash;
        }

        // Guardar el XML
        $xml->asXML('user_config.xml');
        $message = 'Cambios guardados correctamente.';
    } else {
        $message = 'Usuario no encontrado.';
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
