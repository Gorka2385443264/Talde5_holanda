<!-- SIDEBAR -->
<?php
require_once (APP_DIR . "/src/translations/translations.php"); //APP_DIR erabilita itzulpenen dokumentua atzitu dugu.
?>
<button class="boton_sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
  aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-gear"></i></button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
  aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"><img src="../../../public/Argazkiak/logo_white.png"
        alt=""></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul>
      <li><a href="./mainPage.php"><i class="fa-solid fa-house"></i>
          <?= trans("Inicio") ?>
        </a></li>
      <li><a href="../supplier/sobre_nosotros.php"><i class="fa-solid fa-circle-info"></i>
          <?= trans("Sobre Nosotros") ?>
        </a></li>
      <li><a href="../supplier/berriak.php"><i class="fa-solid fa-circle-info"></i>
          <?= trans("Noticias") ?>
        </a></li>
      <li><a href="../supplier/tendentziak.php"><i class="fa-solid fa-circle-info"></i>
          <?= trans("Tendencias") ?>
        </a></li>
      <li><a href="../supplier/cesta.php"><i class="fa-solid fa-cart-shopping"></i>
          <?= trans("Cesta de compra") ?>
        </a></li>
      <li><a href="../supplier/estado.php"><i class="fa-solid fa-truck-fast"></i>
          <?= trans("Estado del producto") ?>
        </a></li>
      <li>
        <div class="cart-icon">
          <a href="/Talde5_holanda/src/views/supplier/cesta.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="numero_icono_cesta">
              <?= isset ($_SESSION['cesta']) ? count($_SESSION['cesta']) : 0 ?>
            </span>
          </a>
        </div>
      </li>
      <li>

        <div class="cart-icon2">
          <?php require_once (APP_DIR . "/src/views/supplier/_parts/selectLang.php"); ?>
        </div>
        <?php
        require_once (APP_DIR . "/src/views/supplier/footer.php");
        ?>

      </li>
    </ul>
  </div>
</div>