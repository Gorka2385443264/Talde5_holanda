<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/productos.css">

<title>Second Life</title>
</head>

<body>


    <!-- Div verde en la parte superior -->
    <div class="top-bar">
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/top_bar.php");
        ?>
    </div>
    <div class="left-bar"></div>


    <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once(APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>

 

  


   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   

    <!-- Aqui empieza ya el final de la pagina -->
    <?php
    require_once(APP_DIR . "/src/views/supplier/footer.php");
    ?>

</body>