<?php

$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Invitado';
$apellido_usuario = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : '';

?>
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
        <a href="mainPage.php" class="icon1"><i class="fa-solid fa-house"></i></a>
        <a href="catalogo.php" class="icon2"><i class="fa-solid fa-bicycle"></i></a>
        <a href="miPerfil.php" class="icon3"><i class="fa-regular fa-user"></i></a>
        <a href="ajustes.php" class="icon4"><i class="fa-solid fa-gear"></i></a>
    </div>
</div>