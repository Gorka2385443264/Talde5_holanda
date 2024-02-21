<!-- SIDEBAR -->
<?php
require_once(APP_DIR . "/src/translations/translations.php"); //APP_DIR erabilita itzulpenen dokumentua atzitu dugu.
?>
<button class="boton_sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Second-life <img src="../../../public/Argazkiak/logo.png" alt=""></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul>
      <li><a href="../mainPage/index.php"><i class="fa-solid fa-house"></i> <?= trans("Inicio") ?></a></li>
      <li><a href="../supplier/informacion.php"><i class="fa-solid fa-circle-info"></i> <?= trans("Información") ?></a></li>
      <li><a href="../supplier/productos.php"><i class="fa-solid fa-list"></i> <?= trans("Lista de productos") ?></a></li>
      <li><a href="../supplier/hornitzailea.php"><i class="fa-solid fa-boxes-stacked"></i> <?= trans("Hornitzailea bihurtu") ?></a></li>
      <li><a href="../supplier/cesta.php"><i class="fa-solid fa-cart-shopping"></i> <?= trans("Cesta de compra") ?></a></li>
      <li><a href="../supplier/estado_producto.php"><i class="fa-solid fa-truck-fast"></i> <?= trans("Estado del producto") ?></a></li>
    </ul>
  </div>
</div>