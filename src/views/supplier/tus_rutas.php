<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<style>
    #rutas ul {
        list-style-type: none;
        padding: 0;
    }

    #rutas li {
        cursor: pointer;
        padding: 10px;
        background-color: #f0f0f0;
        margin-bottom: 5px;
        transition: background-color 0.3s;
    }

    #rutas li:hover {
        background-color: #e0e0e0;
    }

    #detalleRuta {
        padding: 20px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    #mapaRuta {
        height: 400px;
        width: 100%;
        margin-top: 20px;
        border: 1px solid #ddd;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap&libraries=&v=weekly" async defer></script>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("mapaRuta"), {
            center: { lat: 51.560596, lng: 5.091914 }, // Coordenadas de Tilburgo
            zoom: 12,
        });
    }

    function mostrarDetalleRuta(ruta) {
        document.getElementById('detalleRuta').innerHTML = `
            <h2>${ruta.nombre}</h2>
            <p>Duración: ${ruta.duracion}</p>
            <p>Longitud: ${ruta.longitud}</p>
        `;
        // Aquí iría el código para mostrar la ruta en el mapa
        // Por ejemplo, utilizando la Directions API de Google Maps
    }
</script>
<title>Fiets.Huur Rutas de Bicicleta en Tilburgo</title>
</head>
<?php

if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
    $apellido_usuario = $_SESSION['apellido_usuario'];
}
?>

<body>
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <h1>Rutas de bicis en Tilburgo</h1>
        <div id="rutas">
            <ul>
                <li onclick="mostrarDetalleRuta({nombre: 'Ruta del Parque Central', duracion: '2 horas', longitud: '5 km'})">Ruta del Parque Central</li>
                <li onclick="mostrarDetalleRuta({nombre: 'Ruta del Río', duracion: '3 horas', longitud: '10 km'})">Ruta del Río</li>
                <!-- Más rutas aquí -->
            </ul>
        </div>

        <div id="detalleRuta">
            <!-- Los detalles de la ruta aparecerán aquí -->
        </div>

        <div id="mapaRuta">
            <!-- El mapa de Google Maps se cargará aquí -->
        </div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>
</html>
