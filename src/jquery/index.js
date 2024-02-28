$(document).ready(function() {
    $("#login").css("display", "none");
    // Manejar evento click en el div de iniciar sesión
    $("#iniciar_sesion").click(function() {
        $("#registrar").hide();
        $("#login").show();
    });

    // Manejar evento click en el div de registrar sesión
    $("#registrar_sesion").click(function() {
        $("#login").hide();
        $("#registrar").show();
    });
});