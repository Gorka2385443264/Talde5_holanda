<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

$message = '';

// Cargar el color del usuario desde el archivo XML
$xml = simplexml_load_file('user_config.xml');
$userColor = "#ffffff"; // Color por defecto si no se encuentra en el XML

if ($xml) {
    $colorElement = $xml->xpath("//user/color");
    if (!empty($colorElement)) {
        $userColor = (string) $colorElement[0];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = $_POST['color']; // Obtener el color del formulario

    // Cargar el archivo XML
    $xml = simplexml_load_file('user_config.xml');

    if ($xml === false) {
        $message = 'Error al cargar la configuración del usuario.';
    } else {
        // Buscar el primer elemento <user>
        $user = $xml->user;

        if (!empty($user)) {
            // Actualizar el color del usuario en el archivo XML
            $user->color = $color; // Actualizar el valor del elemento 'color'

            // Guardar el XML
            $xml->asXML('user_config.xml');
            $message = 'Color actualizado correctamente.';
        } else {
            $message = 'Usuario no encontrado.';
        }

    }
}
?>

<title><?= trans("ajustes") ?></title>
<link rel="stylesheet" href="/Talde5_holanda/src/css/ajustes.css">
</head>

<body>
    <div class="container">
        <h1><?= trans("ajustes") ?></h1>
        <?php if (!empty($message)): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form action="ajustes.php" method="post">
            <div class="form-group">
                <label for="color"><?= trans("Color de fondo") ?>:</label>
                <!-- Mostrar el color del XML como valor predeterminado -->
                <input type="color" id="color" name="color" value="<?= $userColor ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="save-btn"><?= trans("Guardar") ?></button>
            </div>
        </form>

        <button onclick="goBack()"><?= trans("Go back") ?> </button>

    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>