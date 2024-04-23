<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

// Inicializar la variable $message
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = $_POST['color']; // Obtener el color del formulario

    // Cargar el archivo XML
    $xml = simplexml_load_file('user_config.xml');
    $user = $xml->xpath("/users/user[@id='{$_SESSION['nombre_usuario']}']")[0];

    // Actualizar el color del usuario en el archivo XML
    if ($user) {
        $user->color = $color;

        // Guardar el XML
        $xml->asXML('user_config.xml');
        $message = 'Color actualizado correctamente.';
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
                <label for="color">Color de Fondo:</label>
                <input type="color" id="color" name="color" required>
            </div>
            <div class="form-group">
                <button type="submit" class="save-btn">Guardar Cambios</button>
            </div>
        </form>

        <!-- Botón para ir hacia atrás -->
        <button onclick="goBack()">Volver Atrás</button>

        <?php
        // Incluir la barra de abajo
        require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/barraDeAbajo.php");
        ?>

    </div>

    <script>
        // Función para ir hacia atrás en la historia del navegador
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>