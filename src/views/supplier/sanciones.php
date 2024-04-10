<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/sanciones.css">
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
        <h1>Servicios de bicis</h1>
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
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sanciones - Alquiler de Bicicletas</title>
    <link rel="stylesheet" href="sanciones.css">
</head>
<body>
    <header>
        <h1>Sanciones por Uso Indebido de Bicicletas</h1>
    </header>
    <main>
        <section>
            <h2>Introducción</h2>
            <p>En nuestro compromiso por ofrecer un servicio de calidad y mantener en buen estado nuestro parque de bicicletas, establecemos un sistema de sanciones para asegurar el buen uso de las mismas.</p>
        </section>
        <section>
            <h2>Tipos de Sanciones</h2>
            <ul>
                <li><strong>Devolución tardía:</strong> Se aplicará un cargo adicional proporcional al tiempo de retraso.</li>
                <li><strong>Daños leves:</strong> Cargos adicionales dependiendo de la gravedad y el costo de reparación.</li>
                <li><strong>Daños graves o pérdida:</strong> Se cobrará el valor total de la bicicleta, además de posibles gastos administrativos.</li>
                <li><strong>Uso indebido:</strong> Multas por utilizar las bicicletas en condiciones no permitidas.</li>
            </ul>
        </section>
        <section>
            <h2>Proceso de Sanción</h2>
            <p>Las sanciones se aplicarán según el criterio de nuestro equipo de supervisión y podrán ser apeladas dentro de los 30 días siguientes a su notificación.</p>
        </section>
    </main>
</body>
</html>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>