<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
    <style>
        /* Establece el tamaño del mapa */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap&libraries=&v=weekly" defer></script>
    <script>
        function initMap() {
            // Configuración del mapa
            const tilburgo = { lat: 51.560596, lng: 5.091914 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: tilburgo,
            });

            // Marcadores para los locales 'fiets.huur'
            const locations = [
                { lat: 51.562915, lng: 5.082285, name: "Local Central" },
                { lat: 51.555907, lng: 5.097452, name: "Local Norte" },
                // Agrega más ubicaciones aquí
            ];

            locations.forEach(function(location) {
                new google.maps.Marker({
                    position: { lat: location.lat, lng: location.lng },
                    map: map,
                    title: location.name
                });
            });
        }
    </script>
    <title>Fiets.Huur - Ubicaciones de Bicis</title>
</head>
<body>
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <h1>Ubicaciones de bicis en Tilburgo</h1>
        <div id="map"></div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>
</html>
