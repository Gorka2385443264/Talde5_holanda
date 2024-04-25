<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/sobre_nosotros.css">
<title>Fiets.Huur </title>
</head>
<?php

if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
    $apellido_usuario = $_SESSION['apellido_usuario'];
}
?>

<body>
    <!-- Div verde en la parte superior -->
    <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv" style="margin-left: 100px;">
        <h1><?= trans("guri buruz") ?></h1>
    </div>



    <main>
        <section>
            <h2><?= trans("Nuestra mision") ?></h2>
            <p><?= trans("ourMis") ?></p>
        </section>
        <section>
            <h2><?= trans("Nuestra Vision") ?></h2>
            <p><?= trans("ourVis") ?>
            </p>
        </section>
        <section id="equipo">
            <h2><?= trans("Conoce al equipo") ?></h2>
            <div class="miembro">
                <h3>Beñat</h3>
                <p><?= trans("Beñat") ?></p>
            </div>
            <div class="miembro">
                <h3>Gorka</h3>
                <p><?= trans("Gorka") ?></p>
            </div>
            <div class="miembro">
                <h3>Urko</h3>
                <p><?= trans("Urko") ?></p>
            </div>
        </section>
    </main>
    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>

</html>

</body>