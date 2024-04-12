<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
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
    <div class="mainDiv">
        <h1>Ubicaciones de bicis</h1>
    </div>


    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>