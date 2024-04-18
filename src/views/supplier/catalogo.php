<?php



session_start();

// Asumiendo que esta función devuelve todos los productos disponibles
function obtenerProductoPorId($productoId) {
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

// Inicializa el carrito si no existe en la sesión
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Manejar la adición de productos al carrito
if (isset($_POST['productoId'])) {
    // ... manejo de la adición de productos
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
                    <div class="lines flex1">
                        <button>50% OFF</button>
                    </div>
                </div>

                <div class="content grid top">
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bicicleta-electrica-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="1"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Electric bike</h3>
                        <p>(Comfortable and a very efficient autonomy)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="1">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-de-ciudad-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="2"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="2">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-de-carretera-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="3"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="3">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-electrica-ciudad-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="4"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="4">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bicicleta-montaña-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="5"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="5">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bmx-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart favorito" data-producto-id="6"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button class="rent-now" data-producto-id="6">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="slider-container">
        <div class="slides">
        <div class="slide">
                <div class="slide-content">
                    <h2>KTM 125 DUKE</h2>
                    <p>- Motor cc: 370.0cc</p>
                    <p>- Caballos de potencia: 14.5 bhp @ 9250rpm</p>
                    <p>- Capacidad del tanque: 10.2 L</p>
                    <p>- Distancia entre ejes: 1366mm</p>
                    <p>- Refrigerante: Líquido refrigerante</p>
                    <p>- Motor maximo: 12Nm @ 8000rpm</p>

                    <br>
                    <h1>Price: 1999,99€</h1>
                    <button class="rent-now" data-producto-id="7">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->

                </div>
                <div class="slide-content-img">
                    <img src="../../../public/Argazkiak/bici-dos-personas-removebg-preview.png" alt="">
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <h2>KTM 125 AKI</h2>
                    <p>- Motor cc: 370.0cc</p>
                    <p>- Caballos de potencia: 14.5 bhp @ 9250rpm</p>
                    <p>- Capacidad del tanque: 10.2 L</p>
                    <p>- Distancia entre ejes: 1366mm</p>
                    <p>- Refrigerante: Líquido refrigerante</p>
                    <p>- Motor maximo: 12Nm @ 8000rpm</p>

                    <br>
                    <h1>Price: 1999,99€</h1>
                    <button class="rent-now" data-producto-id="8">Rent now</button><!-- Asegúrate de aplicar este cambio a todos los botones similares. -->

                </div>
                <img src="../../../public/Argazkiak/doble-removebg-preview.png" alt="">
            </div><!-- Asegúrate de que tus slides estén aquí -->
        </div>
        <div class="arrow left" onclick="plusSlides(-1)">‹</div>
        <div class="arrow right" onclick="plusSlides(1)">›</div>
    </div>
    
    <!-- El resto de tu contenido ... -->

</div>

<script>
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
    setInterval(function() {
        plusSlides(1);
    }, 3000); // Cambiará el slide cada 3 segundos
</script>
</body>
</html>
