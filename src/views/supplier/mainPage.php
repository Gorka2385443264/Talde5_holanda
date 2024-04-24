<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

// Cargar el color del usuario desde el archivo XML
$xml = simplexml_load_file('user_config.xml');
$userColor = "pink"; // Color por defecto si no se encuentra en el XML

if ($xml) {
    $colorElement = $xml->xpath("//user/color");
    if (!empty($colorElement)) {
        $userColor = (string) $colorElement[0];
    }
}
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">

<title>Fiets.Huur </title>
</head>
<style>
    /* Aplicar el color del usuario al contenedor deseado */
    .catalogoGrande a div {
        background-color:
            <?= $userColor ?>
        ;
    }
</style>

<body>
    <!-- Div verde en la parte superior -->
    <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <div class="catalogoGrande">
            <a href="./sanciones.php" style="text-decoration: none; color: black;">
                <div class="Servicios">
                    <h1><?= trans("Sanciones") ?></h1>
                </div>
            </a>

            <a href="./ubicaciones.php" style="text-decoration: none; color: black;">
                <div class="ubicaciones">
                    <h1><?= trans("Ubicaciones") ?></h1>
                </div>
            </a>
            <a href="./catalogo.php" style="text-decoration: none; color: black;">
                <div class="catalogo">
                    <h1><?= trans("Catalogo") ?></h1>
                </div>
            </a>
            <a href="./cesta.php" style="text-decoration: none; color: black;">
                <div class="tuRuta">
                    <h1><?= trans("Cesta") ?></h1>
                </div>
            </a>
        </div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>