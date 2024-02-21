<link rel="stylesheet" href="/TALDE5_HOLANDA/src/css/info.css">
<title>Second Life - Info</title>
<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/TALDE5_HOLANDA/src/views/supplier/_parts/head.php");
?>
</head>

<body>

    <!-- Div verde en la parte superior -->
    <div class="top-bar">
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/TALDE5_HOLANDA/src/views/supplier/top_bar.php");
        ?>
    </div>
    <div class="left-bar"></div>


    <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once(APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>


    <div class="container_info">
        <div class="nuestraMision">
            <h1><?= trans("Sobre Nosotros") ?></h1>
            <p><?= trans("SecondLife es una empresa comprometida con la reutilización y la reducción de residuos electrónicos al ofrecer productos informáticos de segunda mano de alta calidad. Especializada en la venta de dispositivos refurbished, la misión de SecondLife es extender la vida útil de equipos informáticos, contribuyendo así a la disminución de la generación de desechos electrónicos. Al proporcionar opciones accesibles y respetuosas con el medio ambiente, SecondLife no solo se preocupa por las necesidades tecnológicas de sus clientes, sino que también aboga por un consumo responsable, fomentando un ciclo de vida más sostenible para los productos informáticos.") ?></p>
        </div>
        <div class="imagen_info">
            <img src="/TALDE5_HOLANDA/public/Argazkiak/logo.png" alt="">
        </div>
    </div>

    <div class="container_info2">
        <h1><?= trans("Donde nos ubicamos?") ?></h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1117.8661570466456!2d1.5547717183075787!3d42.516740637000794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDLCsDMxJzAwLjMiTiAxwrAzMycyMS4wIkU!5e1!3m2!1ses!2ses!4v1704732856280!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <!-- Aqui empieza ya el final de la pagina -->
    <?php
    require_once(APP_DIR . "/src/views/supplier/footer.php");
    ?>


</body>

</html>