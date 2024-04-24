<!-- SIDEBAR -->
<?php require_once (APP_DIR . "/src/translations/translations.php"); ?>

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
      <li><a href="../supplier/estado.php"><i class="fa-solid fa-truck-fast"></i>
          <?= trans("Estado del producto") ?>
        </a></li>
      <li>
      </li>
      <li>
        <div class="traductor">
          <?php require_once (APP_DIR . "/src/views/supplier/_parts/selectLang.php"); ?>
        </div>
      </li>
    </ul>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function changeLanguage(language) {
    $.post('cambiarIdioma.php', { language: language }, function (response) {
      location.reload(); // Recargar la página para aplicar los cambios de idioma
    });
  }
</script>