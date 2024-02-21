<div class="cart-iconLOGO">
    <a href="/Talde5_holanda/src/views/mainPage/index.php"><img src="/Talde5_holanda/public/Argazkiak/logo.png" alt=""></a>
</div>
<div class="cart-icon2">
    <?php require_once(APP_DIR . "/src/views/supplier/_parts/selectLang.php"); ?>
</div>
<div class="cart-icon">
    <a href="/Talde5_holanda/src/views/supplier/cesta.php">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="numero_icono_cesta"><?= isset($_SESSION['cesta']) ? count($_SESSION['cesta']) : 0 ?></span>
    </a>
</div>
