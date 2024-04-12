<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">
<title>Fiets.Huur </title>
</head>
<?php

if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
    $apellido_usuario = $_SESSION['apellido_usuario'];
}
?>

<body>
    <!-- Div verde en la parte superior -->
    <!-- NO TOCAR -->
    <div class="sidebar">
        <?php
        require_once (APP_DIR . "/src/views/supplier/sidebar.php");
        ?>
    </div>
    <div class="mainDiv">
        <h1>Catalogo de bicis</h1>
    </div>



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
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Electric bike</h3>
                        <p>(Comfortable and a very efficient autonomy)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=1'">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-de-ciudad-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=2'">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-de-carretera-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=3'">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bici-electrica-ciudad-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=4'">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bicicleta-montaña-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=5'">Rent now</button>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="../../../public/Argazkiak/bmx-removebg-preview.png" width="300">
                        <div class="flex1">
                            <label>50%</label>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>

                    <div class="detalis">
                        <h3>Aerion Carrbo Helmet</h3>
                        <p>(Fashion , Twin Disc)</p>
                        <h2>$699 <span>/hour</span> </h2>
                        <button onclick="window.location.href='pago.php?productoId=6'">Rent now</button>
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
                </div>
                <div class="slide-content-img">
                    <img src="../../../public/Argazkiak/moto1.png" alt="">
                </div>
            </div>
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
                </div>
                <img src="../../../public/Argazkiak/moto1.png" alt="">
            </div>
            <!-- Agrega más slides según sea necesario -->
        </div>
        <div class="arrow left">‹</div>
        <div class="arrow right">›</div>
    </div>

    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
    <script>
        $(document).ready(function () {
            let slideIndex = 0;
            let sliding = false;

            function showSlides() {
                if (sliding) return; // Evita cambios mientras se está deslizando
                sliding = true;
                const slides = $('.slide');
                const currentSlide = slides.eq(slideIndex);
                const nextSlideIndex = (slideIndex + 1) % slides.length;
                const nextSlide = slides.eq(nextSlideIndex);

                currentSlide.fadeOut(500, function () {
                    currentSlide.removeClass('active');
                    nextSlide.addClass('active').hide().fadeIn(500, function () {
                        sliding = false; // Marca el final del deslizamiento
                    });
                    slideIndex = nextSlideIndex;
                });
            }

            $('.arrow').click(showSlides);
        });
    </script>
</body>