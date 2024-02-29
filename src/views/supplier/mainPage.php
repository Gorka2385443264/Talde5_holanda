<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<title>Fiets.Huur </title>
</head>
<body>
    <!-- Div verde en la parte superior -->
     <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once(APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <div class="catalogoGrande">
        <div class="Servicios">
            <div class="imagenDentroCatalogo">
                <img src="/Talde5_holanda/public/Argazkiak/imagen_Servicio.jpg" alt="">
            </div>
            <h1>Servicios</h1>
        </div>
        <div class="ubicaciones">
            <h1>Ubicaciones</h1>
        </div>
        <div class="catalogo">
            <h1>Catalogo</h1>
        </div>
        <div class="tuRuta">
            <h1>Tus rutas</h1>
        </div>
        </div>
      
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Aqui empieza ya el final de la pagina -->
  
</body>