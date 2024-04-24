<?php
session_start();

// Asumiendo que esta función devuelve todos los productos disponibles
function obtenerProductoPorId($productoId)
{
    $productos = [
        1 => ['id' => 1, 'name' => 'Bicicleta Eléctrica', 'price' => 699],
        2 => ['id' => 2, 'name' => 'Casco Aerion Carrbo', 'price' => 150],
        3 => ['id' => 3, 'name' => 'Bicicleta de Carretera', 'price' => 850],
        4 => ['id' => 4, 'name' => 'Bicicleta Eléctrica de Ciudad', 'price' => 1200],
        5 => ['id' => 5, 'name' => 'Bicicleta de Montaña', 'price' => 980],
        6 => ['id' => 6, 'name' => 'BMX', 'price' => 720],
        7 => ['id' => 7, 'name' => 'Bicicleta de 3 Ruedas', 'price' => 720],
        8 => ['id' => 8, 'name' => 'Bicicleta para 2 Personas', 'price' => 720]
    ];

    return $productos[$productoId] ?? false;
}

if (isset($_POST['productoId']) && !isset($_POST['action'])) {
    $productoId = $_POST['productoId'];
    $producto = obtenerProductoPorId($productoId);

    if ($producto) {
        $_SESSION['cart'][$productoId] = $producto;
        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets.Huur</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="mainDiv">
        <h1>Catálogo de Bicis</h1>
        <a href="mainPage.php" class="back-to-index">
            <button class="back-button">⬅</button>
        </a>
        <section class="latest top">
            <div class="scontainer">
                <div class="heading">
                    <h1>Latest Popular Bike</h1>
                </div>
                <div class="content grid top">
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bicicleta-electrica-removebg-preview.png" width="300">
                        </div>
                        <div class="detalis">
                            <h3>Electric bike</h3>
                            <p>(Comfortable and a very efficient autonomy)</p>
                            <h2>$699 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="1">Rent now</button>
                        </div>
                    </div>
                    <!-- Repite este bloque para cada producto -->
                </div>
            </div>
        </section>
        <div class="slider-container">
            <div class="slides">
                <div class="slide">
                    <div class="slide-content">
                        <h2>KTM 125 DUKE</h2>
                        <!-- Detalles del producto -->
                        <h1>Price: 1999,99€</h1>
                        <button class="rent-now" data-producto-id="7">Rent now</button>
                    </div>
                    <div class="slide-content-img">
                        <img src="../../../public/Argazkiak/bici-dos-personas-removebg-preview.png" alt="">
                    </div>
                </div>
                <!-- Repite este bloque para cada producto -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.rent-now').click(function () {
                var productoId = $(this).data('producto-id');
                $.post('catalogo.php', { productoId: productoId }, function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        // Redireccionar a la página del carrito
                        window.location.href = 'cesta.php';
                    } else {
                        alert("El producto se ha añadido a la cesta");
                    }
                });
            });
        });

        var slideIndex = 0;
        showSlides(slideIndex);

        function plusSlides(n) {
            slideIndex += n;
            showSlides(slideIndex);
        }

        function showSlides(n) {
            var slides = $(".slide");
            if (n >= slides.length) {
                slideIndex = 0;
            }
            if (n < 0) {
                slideIndex = slides.length - 1;
            }
            slides.hide().eq(slideIndex).addClass('active').fadeIn();
        }

        // Auto-slide
        setInterval(function () {
            plusSlides(1);
        }, 10000); // Cambiará el slide cada 3 segundos
    </script>
</body>

</html>