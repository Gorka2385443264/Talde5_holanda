<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/sobre_nosotros.css">
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
        <h1>Sobre nosotros</h1>
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
    <main>
        <section>
            <h2>Nuestra Misión</h2>
            <p>Ofrecer un servicio de alquiler de bicicletas accesible, sostenible y de alta calidad para mejorar la movilidad urbana y fomentar un estilo de vida activo y ecológico.</p>
        </section>
        <section>
            <h2>Nuestra Visión</h2>
            <p>Ser reconocidos como la principal opción de movilidad urbana sostenible, expandiendo nuestra cobertura y diversificando nuestra flota de bicicletas para satisfacer todas las necesidades de nuestros usuarios.</p>
        </section>
        <section id="equipo">
            <h2>Conoce al Equipo</h2>
            <div class="miembro">
                <img src="ruta/a/imagen/de/beñat.jpg" alt="Beñat">
                <h3>Beñat</h3>
                <p>Fundador y CEO. Apasionado del ciclismo y la innovación, Beñat lidera el equipo con visión y dedicación.</p>
            </div>
            <div class="miembro">
                <img src="ruta/a/imagen/de/gorka.jpg" alt="Gorka">
                <h3>Gorka</h3>
                <p>Co-fundador y CTO. Ingeniero y ciclista, Gorka es el cerebro detrás de nuestra tecnología y operaciones.</p>
            </div>
            <div class="miembro">
                <img src="ruta/a/imagen/de/urko.jpg" alt="Urko">
                <h3>Urko</h3>
                <p>Co-fundador y Director de Marketing. Creativo y estratega, Urko se encarga de conectar nuestra marca con la comunidad.</p>
            </div>
        </section>
    </main>
</body>
</html>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>