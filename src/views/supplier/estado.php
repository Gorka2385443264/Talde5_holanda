<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

$statusMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe el ID de la bicicleta y el nuevo estado
    $idBizikleta = $_POST['idBizikleta'];
    $newEgoera = $_POST['egoera'];

    // Conexión a la base de datos (suponiendo que ya tienes la conexión establecida)
    $conexion = new mysqli("localhost:3306", "root", "1WMG2023", "erronka3");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para actualizar el estado de la bicicleta
    $sql = "UPDATE bizikleta SET egoera = '$newEgoera' WHERE id_bizikleta = '$idBizikleta'";

    if ($conexion->query($sql) === TRUE) {
        $statusMessage = "El estado de la bicicleta con ID '$idBizikleta' ha sido actualizado a '$newEgoera'";
    } else {
        $statusMessage = "Error al actualizar el estado de la bicicleta: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/estado.css"> <!-- Enlaza a tu archivo CSS -->
</head>

<body>
    <div class="status-form">
        <h2><?= trans("Verificar") ?></h2>
        <form action="estado.php" method="post">
            <input type="text" id="idBizikleta" name="idBizikleta" placeholder="<?= trans("ID de la bicicleta") ?>"
                required>
            <input type="text" id="egoera" name="egoera" placeholder="<?= trans("Nuevo estado") ?>" required>
            <button type="submit"><?= trans("Actualizar Estado") ?></button>
        </form>
        <?php if ($statusMessage): ?>
            <div class="status-message">
                <?php echo $statusMessage; ?>
            </div>
        <?php endif; ?>
        <a href="mainPage.php">Volver a la página principal</a>
    </div>
</body>

</html>