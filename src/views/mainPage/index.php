<!DOCTYPE html>
<html lang="en">

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
<?php require_once "../../php/conectar.php"; ?>

<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="../../php/conectar.php" method="post" class="formulario__login" id="form_login">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Correo Electronico" name="correo_login">
                    <input type="password" placeholder="Contraseña" name="contraseña_login">
                    <button type="submit" id="sartu">Entrar</button>
                </form>
                <!--Register-->
                <form action="" method="post" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre" name="nombre">
                    <input type="text" placeholder="Apellido" name="apellido">
                    <input type="email" placeholder="Correo Electronico" name="correo">
                    <input type="number" placeholder="Telefono" name="telefono">
                    <input type="password" placeholder="Contraseña" name="contraseña">
                    <button type="submit" id="erregistratu">Regístrarse</button>
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
                        if (response.trim() === "Credenciales incorrectas") {
                            alert('Credenciales incorrectas');
                        } else if (response.trim() === "Nombre no encontrado") {
                            alert('Error: Nombre no encontrado');
                        } else {
                            alert('opa');
                            window.location.href = "../supplier/mainPage.php";

                        }
                    }
                });
            });
        });
    </script>
</body>

</html>