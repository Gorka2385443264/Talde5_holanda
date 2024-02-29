<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>
<title>Fiets.Huur - LOGIN </title>
</head>

<body>
    <div class="topbar"><img src="../../../public/Argazkiak/logo_white.png" alt=""></div><br>
    <div class="eleguir_tipo_inicio">
        <div id="registrar_sesion">
            Registrarse
        </div>
        <div id="iniciar_sesion">
            Iniciar Sesion
        </div>

    </div>
    <!-- REGISTRAR -->
    <div id="registrar" class="login-container">
        <div class="info-section">
            <h1>Confirma tu información:</h1><br>
            <input type="text" id="fname" name="fname" placeholder="Añade tu nombre">
            <input type="text" id="fname" name="fname" placeholder="Añade tu apellido">
            <input type="text" id="fname" name="fname" placeholder="Añade tu correo"
                style="margin-top: 5px;margin-bottom: 5px; width: 390px;">
            <input class="tlf_input" type="tel" id="mnumber" name="mnumber" pattern="[0-9]{9}"
                placeholder="Añade tu numero de telefono" style="margin-top: 5px;margin-bottom: 5px; width: 390px;">
            <input type="password" id="password" name="password" placeholder="Añade tu contraseña"
                style="margin-top: 5px; margin-bottom: 5px; width: 390px;">
        </div>
        <div class="enter_buttons">
            <div class="izquierda"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="derecha"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </div>
    <!-- LOGIN -->
    <div id="login" class="login-container">
        <div class="info-section">
            <h1>Inicia Sesion: </h1><br>

            <input type="text" id="fname" name="fname" placeholder="Añade tu correo"
                style="margin-top: 5px;margin-bottom: 5px; width: 390px;">

            <input type="password" id="password" name="password" placeholder="Añade tu contraseña"
                style="margin-top: 5px; margin-bottom: 5px; width: 390px;">
        </div>
        <div class="enter_buttons">
            <div class="izquierda">
                <a href="../supplier/mainPage.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <a href="../supplier/mainPage.php"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

</body>

<script>
    <?php require_once(APP_DIR . "/src/jquery/index.js"); ?>
</script>