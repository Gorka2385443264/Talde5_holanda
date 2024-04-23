<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

// Cargar el color del usuario desde el archivo XML
$xml = simplexml_load_file('user_config.xml');
$userColor = ($xml && isset($_SESSION['nombre_usuario'])) ? (string) $xml->xpath("/users/user[@id='{$_SESSION['nombre_usuario']}']/color")[0] : "#ffffff"; // Color por defecto si no se encuentra en el XML

?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<title>Fiets.Huur </title>
</head>
<style>
    /* Aplicar el color del usuario al contenedor deseado */
    .container {
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
                    <h1>Sanciones</h1>
                </div>
            </a>

            <a href="./ubicaciones.php" style="text-decoration: none; color: black;">
                <div class="ubicaciones">
                    <h1>Ubicaciones</h1>
                </div>
            </a>
            <a href="./catalogo.php" style="text-decoration: none; color: black;">
                <div class="catalogo">
                    <h1>Catalogo</h1>
                </div>
            </a>
            <a href="./cesta.php" style="text-decoration: none; color: black;">
                <div class="tuRuta">
                    <h1>Zesta</h1>
                </div>
            </a>
        </div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>