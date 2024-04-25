<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

$statusMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe el ID de la bicicleta y el nuevo estado
    $idBizikleta = $_POST['idBizikleta'];

    // Dependiendo de la opción seleccionada, asigna el valor correspondiente a $newEgoera
    if ($_POST['egoera'] == "Bien") {
        $newEgoera = "Ondo";
    } elseif ($_POST['egoera'] == "Mal") {
        $newEgoera = "Gaizki";
    }

    // Conexión a la base de datos (suponiendo que ya tienes la conexión establecida)
    $conexion = new mysqli("localhost:3306", "root", "1WMG2023", "erronka3");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para actualizar el estado de la bicicleta
    $sql = "UPDATE bizikleta SET egoera = '$newEgoera' WHERE id_bizikleta = '$idBizikleta'";

    if ($conexion->query($sql) === TRUE) {
        $statusMessage = trans("Gracias");
    } else {
        $statusMessage = "Error al actualizar el estado de la bicicleta: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/estado.css">
</head>

<body>
    <div class="status-form">
        <p style="text-align: center;"><?= trans("Aquí puedes decir si el estado de la Bicicleta está Mal o Bien") ?>
        </p>

        <h2><?= trans("Verificar") ?></h2>
        <form action="estado.php" method="post">
            <input type="text" id="idBizikleta" name="idBizikleta" placeholder="<?= trans("ID de la bicicleta") ?>"
                required>
            <!-- Reemplaza el campo de entrada de texto con un menú desplegable -->
            <select id="egoera" name="egoera" required>
                <option id="bien" value="Bien"><?= trans("Bien") ?></option>
                <option id="mal" value="Mal"><?= trans("Mal") ?></option>
            </select><br>
            <button type="submit"><?= trans("Actualizar Estado") ?></button>
        </form>
        <?php if ($statusMessage): ?>
            <div class="status-message">
                <?php echo $statusMessage; ?>
            </div>
        <?php endif; ?><br>
        <a href="mainPage.php"><?= trans("Volver a la página principal") ?></a>
    </div>
</body>

</html>