<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<style>
    /* Establece el tamaño del mapa */
    #map {
        height: 400px;
        width: 100%;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    form {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: calc(100% - 22px);
        /* Full width minus padding and border */
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .comentario {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
</style>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIDEnVgmM_Lf_jRVmR0LzU--TRdAUcmDg&callback=initMap&libraries=&v=weekly"
    defer></script>
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
            { lat: 52.38930541416541, lng: 4.838206780370247, name: "Fiets.huur Local Norte" },
            { lat: 52.36290280175466, lng: 4.922732455229116, name: "Fiets.huur Local Oeste" },
            // Agrega más ubicaciones aquí
        ];

        locations.forEach(function (location) {
            new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                map: map,
                title: location.name
            });
        });
    }
</script>
<title>Fiets.Huur</title>
</head>

<body>
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <h1 style="margin-left: 100px;"><?= trans("Ubicaciones") ?></h1>
        <div id="map"></div>
    </div>
    <form action="procesar_comentario.php" method="post">
        <label for="titulo"><?= trans("titulo") ?>:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <label for="comentario"><?= trans("Coment") ?>:</label>
        <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="<?= trans("sendComment") ?>">
    </form>
    <?php
    $archivo_xml = "comentarios.xml";

    // Comprueba si el archivo XML existe y no está vacío
    if (file_exists($archivo_xml) && filesize($archivo_xml) > 0) {
        $xml = simplexml_load_file($archivo_xml);

        // Comprueba si el archivo XML se cargó correctamente
        if ($xml) {
            // Itera sobre cada elemento 'usuarioa' dentro del XML
            foreach ($xml->comentario as $comentario) {
                echo "<div>";
                echo "<p><strong>" . trans("Comentarios") . "</strong></p>";
                echo "<p><strong>" .  trans("titulo")  . "</strong> " . htmlspecialchars($comentario->titulo) . "</p>";
                echo "<p><strong>" . trans("Coment")  . ":</strong> " . htmlspecialchars($comentario->comentario) . "</p>";
                echo "</div><br>";
            }
        } else {
            echo "Error cargando el archivo XML.";
        }
    } else {
        echo "El archivo XML no existe o está vacío.";
    }
    ?>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>

</html>