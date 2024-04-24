<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets.Huur</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/Talde5_holanda/src/css/login.css">
</head>
<?php

require_once ("../supplier/_parts/head.php");
 require_once ("../../php/conectar.php");
?>

<body>
    <main>
        
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3><?= trans("log in") ?></h3>
                    <p><?= trans("log in2") ?></p>
                    <button id="btn__iniciar-sesion"><?= trans("log in3") ?></button>
                </div>
                <div class="caja__trasera-register">
                    <h3><?= trans("Register") ?></h3>
                    <p><?= trans("Register2") ?></p>
                    <button id="btn__registrarse"><?= trans("Register3") ?></button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="../../php/conectar.php" method="post" class="formulario__login" id="form_login">
                    <h2><?= trans("log in3") ?></h2>
                    <input type="email" placeholder="<?= trans("placeHold1") ?>" name="correo_login">
                    <input type="password" placeholder="<?= trans("placeHold2") ?>" name="contraseña_login">
                    <button type="submit" id="sartu"><?= trans("log in3") ?></button>
                </form>
                <!--Register-->
                <form action="" method="post" class="formulario__register">
                    <h2><?= trans("Register3") ?></h2>
                    <input type="text" placeholder="<?= trans("placeHold3") ?>" name="nombre">
                    <input type="text" placeholder="<?= trans("placeHold4") ?>" name="apellido">
                    <input type="email" placeholder="<?= trans("placeHold1") ?>" name="correo">
                    <input type="number" placeholder="<?= trans("placeHold5") ?>" name="telefono">
                    <input type="password" placeholder="<?= trans("placeHold2") ?>" name="contraseña">
                    <button type="submit" id="erregistratu"><?= trans("Register3") ?></button>
                </form>
            </div>
        </div>
        

    </main>

    <script src="/Talde5_holanda/src/jquery/index.js"></script>

    <script>
    $(document).ready(function () {
        $('#form_login').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../../php/conectar.php',
                data: $(this).serialize(),
                success: function (response) {
                    var trimmedResponse = response;

                    if (trimmedResponse === "Credenciales incorrectas") {
                        alert('Credenciales incorrectas');
                    } else if (trimmedResponse === "Inicio de sesión exitoso") {
                        alert('Inicio de sesión exitoso');
                        window.location.href = "../supplier/mainPage.php";
                    } else {
                        alert('Error no identificado: ' + trimmedResponse);
                    }
                }
            });
        });
    });
</script>


</body>

</html>