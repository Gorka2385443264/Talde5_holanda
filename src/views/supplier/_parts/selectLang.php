<form method="post">
  <div class="opcion_idioma_borde">
    <select class="opcion_idioma" name="selectedLang">
      <option class="opcion_idioma" value="eus" <?php



        // Si el idioma seleccionado en el formulario es euskera, establecer "selected"
        if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'eus') {
          echo 'selected';
        } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'eus') {
          // Si no se selecciona ningún idioma en el formulario y hay euskera en la sesión, establecer "selected"
          echo 'selected';
        }



      ?>> EUS</option>
      <option class="opcion_idioma" value="es" <?php

        // Si el idioma seleccionado en el formulario es español, establecer "selected"
        if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'es') {
          echo 'selected';
        } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'es') {
          // Si no se selecciona ningún _LANGUAGE en el formulario y hay español en la sesión, establecer "selected"
          echo 'selected';
        }



      ?>> ES</option>
      <option class="opcion__LANGUAGE" value="en" <?php



        // Si el _LANGUAGE seleccionado en el formulario es inglés, establecer "selected"
        if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'en') {
          echo 'selected';
        } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'en') {
          // Si no se selecciona ningún _LANGUAGE en el formulario y hay inglés en la sesión, establecer "selected"
          echo 'selected';
        }


        
      ?>> EN</option>
    </select>
    <button class="aldatu_hizkuntza_botoia"><?= trans("Aldatu") ?> </button>
  </div>
</form>
