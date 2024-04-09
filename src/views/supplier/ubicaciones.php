<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<title>Fiets.Huur </title>
</head>
<?php

if (isset ($_SESSION['nombre_usuario']) && isset ($_SESSION['apellido_usuario'])) {
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


    <div class="Mainperfil">
        <div class="nombreEtc">
            <div class="iconoDelNombre">
                <i class="fa-regular fa-circle-user"></i>
            </div>
            <div class="resto" style="margin-right: auto;">
                <h1>Hola!</h1>
                <h3>
                    <?php echo $nombre_usuario . " " . $apellido_usuario; ?>
                </h3>
                <div style="margin-right: auto;">Iniciar viaje</div>
            </div>
        </div>
        <div class="baraAbajo">
            <div class="icon1"><i class="fa-regular fa-compass"></i></div>
            <div class="icon2"><i class="fa-solid fa-bicycle"></i></div>
            <div class="icon3"><i class="fa-regular fa-user"></i></div>
            <div class="icon4"><i class="fa-solid fa-gear"></i></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>