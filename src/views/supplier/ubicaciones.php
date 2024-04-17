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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIDEnVgmM_Lf_jRVmR0LzU--TRdAUcmDg&callback=initMap&libraries=&v=weekly" defer></script>
    <script>
        function initMap() {
            // Configuración del mapa
            const tilburgo = { lat: 52.364809341980475, lng: 4.89921372367165 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: tilburgo,
            });

            // Marcadores para los locales 'fiets.huur'
            const locations = [
                { lat: 52.37259585126076, lng: 4.89986331282865, name: "Fiets.huur Local Central" },
                { lat: 52.38930541416541, lng:  4.838206780370247, name: "Fiets.huur Local Norte" },
                { lat: 52.36290280175466, lng:  4.922732455229116, name: "Fiets.huur Local Oeste" },
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
        <h1>Ubicaciones de bicis en Amsterdam</h1>
        <div id="map"></div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>
</html>
