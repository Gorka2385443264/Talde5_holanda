<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/sanciones.css">
<title>Sanciones - Alquiler de Bicicletas </title>
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
        <h1>Sanciones por Uso Indebido de Bicicletas</h1>
    </header>
    <main>
        <section>
            <h2>Introducción</h2>
            <p>En nuestro compromiso por ofrecer un servicio de calidad y mantener en buen estado nuestro parque de
                bicicletas, establecemos un sistema de sanciones para asegurar el buen uso de las mismas.</p>
        </section>
        <section>
            <h2>Tipos de Sanciones</h2>
            <ul>
                <li><strong>Devolución tardía:</strong> Se aplicará un cargo adicional proporcional al tiempo de
                    retraso.</li>
                <li><strong>Daños leves:</strong> Cargos adicionales dependiendo de la gravedad y el costo de
                    reparación.</li>
                <li><strong>Daños graves o pérdida:</strong> Se cobrará el valor total de la bicicleta, además de
                    posibles gastos administrativos.</li>
                <li><strong>Uso indebido:</strong> Multas por utilizar las bicicletas en condiciones no permitidas.
                </li>
            </ul>
        </section>
        <section>
            <h2>Proceso de Sanción</h2>
            <p>Las sanciones se aplicarán según el criterio de nuestro equipo de supervisión y podrán ser apeladas
                dentro de los 30 días siguientes a su notificación.</p>
        </section>
    </main>



    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>