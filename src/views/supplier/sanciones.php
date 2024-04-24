<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/sanciones.css">
<title><?= trans("sanciones") ?> </title>
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
    <div class="mainDiv">
        <h1 style="color: white;">a</h1>
    </div>




    <header>
        <h1><?= trans("sanciones") ?></h1>
    </header>
    <main>
        <section>
            <h2><?= trans("Introduccion") ?></h2>
            <p><?= trans("intro") ?></p>
        </section>
        <section>
            <h2><?= trans("Tipos de sanciones") ?></h2>
            <ul>
                <li><strong><?= trans("Devolucion tardia:") ?></strong> <?= trans("devTar") ?>.</li>
                <li><strong><?= trans("Minor damage") ?>:</strong> <?= trans("minDam") ?></li>
                <li><strong><?= trans("Serious damage or loss") ?>:</strong> <?= trans("damLos") ?></li>
                <li><strong><?= trans("Wrong use") ?>:</strong> <?= trans("WrongUse") ?>
                </li>
            </ul>
        </section>
        <section>
            <h2><?= trans("Sanction process") ?></h2>
            <p><?= trans("sancProc") ?></p>
        </section>
    </main>



    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>