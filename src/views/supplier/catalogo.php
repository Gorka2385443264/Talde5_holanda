<?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

// Asumiendo que esta función devuelve todos los productos disponibles
function obtenerProductoPorId($productoId)
{
    $productos = [
        1 => ['id' => 1, 'name' => 'Bicicleta electrica', 'price' => 4],
        2 => ['id' => 2, 'name' => 'Bicicleta de paseo', 'price' => 2],
        3 => ['id' => 3, 'name' => 'Bicicleta de Carretera', 'price' => 3],
        4 => ['id' => 4, 'name' => 'Bicicleta Eléctrica de Ciudad', 'price' => 1.5],
        5 => ['id' => 5, 'name' => 'Bicicleta de Montaña', 'price' => 3],
        6 => ['id' => 6, 'name' => 'BMX', 'price' => 1],
        7 => ['id' => 7, 'name' => 'Bicicleta de 3 Ruedas', 'price' => 2],
        8 => ['id' => 8, 'name' => 'Bicicleta para 2 Personas', 'price' => 1]
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

<link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">

</head>

<body>
    <div class="mainDiv">
        <div class="sidebar">
            <?php
            require_once (APP_DIR . "/src/views/supplier/sidebar.php");
            ?>
        </div>
        <section class="latest top">
            <div class="scontainer">
                <div class="heading">
                    <h1><?= trans("Catálogo de Bicis") ?></h1>
                </div>
                <div class="content grid top">
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bicicleta-electrica-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">

                            <h3><?= trans("Bicicleta electrica") ?></h3>
                            <p>(<?= trans("Cómoda y una autonomía muy eficiente") ?>)</p>
                            <h2>€4 <span>/hora</span> </h2>
                            <button class="rent-now" data-producto-id="1"><?= trans("Alquila ahora") ?>
</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bici-de-ciudad-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">
                            <h3>Bicicleta de paseo</h3>
                            <p>(Moda, Disco Doble)</p>
                            <h2>$2 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="2">Alquila
                                ahora</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bici-de-carretera-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">
                            <h3>Bicicleta de paseo</h3>
                            <p>(Moda, Disco Doble)</p>
                            <h2>$3 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="3">Alquila
                                ahora</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bici-electrica-ciudad-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">
                            <h3>Bicicleta de paseo</h3>
                            <p>(Moda, Disco Doble)</p>
                            <h2>$1,5 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="4">Alquila
                                ahora</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. --></button>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bicicleta-montaña-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">
                            <h3>Bicicleta de paseo</h3>
                            <p>(Moda, Disco Doble)</p>
                            <h2>$3 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="5">Alquila
                                ahora</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="../../../public/Argazkiak/bmx-removebg-preview.png" width="300">

                        </div>
                        <div class="detalis">
                            <h3>Bicicleta de paseo</h3>
                            <p>(Moda, Disco Doble)</p>
                            <h2>$2 <span>/hour</span> </h2>
                            <button class="rent-now" data-producto-id="6">Alquila
                                ahora</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
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