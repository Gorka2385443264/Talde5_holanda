<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>

<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">
<title>Fiets.Huur </title>
</head>
<?php

if (isset ($_SESSION['nombre_usuario']) && isset ($_SESSION['apellido_usuario'])) {
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


    <div class="Mainperfil">
        <div class="nombreEtc">
            <div class="iconoDelNombre">
                <i class="fa-regular fa-circle-user"></i>
            </div>
            <div class="resto" style="margin-right: auto;">
                <h1>Hola!</h1>
                <h3>
                    <?php echo $nombre_usuario . " " . $apellido_usuario; ?>
                </h3>
                <div style="margin-right: auto;">Iniciar viaje</div>
            </div>
        </div>
        <div class="baraAbajo">
            <div class="icon1"><i class="fa-regular fa-compass"></i></div>
            <div class="icon2"><i class="fa-solid fa-bicycle"></i></div>
            <div class="icon3"><i class="fa-regular fa-user"></i></div>
            <div class="icon4"><i class="fa-solid fa-gear"></i></div>
        </div>
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
                <button>Rent now</button>
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
                <button>Rent now</button>
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
                <button>Rent now</button>
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
                <button>Rent now</button>
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
                <button>Rent now</button>
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
                <button>Rent now</button>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="slider top">
    <div class="scontainer">
      <div class="owl-carousel owl-theme">
        <div class="item flex">
          <div class="left">
            <p>(Fashion , Twin Disc)</p>
            <h1>KTM 125 DUKE</h1>
            <span></span>
            <ul>
              <li>- Engine Cc : 370.0cc</li>
              <li>- Max Power : 14.5 bhp @ 9250 rpm</li>
              <li>- Tank Capacity : 10.2 L</li>
              <li>- Wheelbase : 1366 mm</li>
              <li>- Cooling : Liquid Cooled</li>
              <li>- Max Torque : 12 Nm @ 8000 rpm</li>
            </ul>
            <h2>Price : $1999.99<span>/hour</span></h2>
            <button class="btn2">Buy Now</button>
          </div>
          <div class="right">
            <div class="ani_image">
              <img src="image/bike2.png" alt="">
            </div>
          </div>
        </div>
        <div class="item flex">
          <div class="left">
            <p>(Fashion , Twin Disc)</p>
            <h1>KTM 125 DUKE</h1>
            <span></span>
            <ul>
              <li>- Engine Cc : 370.0cc</li>
              <li>- Max Power : 14.5 bhp @ 9250 rpm</li>
              <li>- Tank Capacity : 10.2 L</li>
              <li>- Wheelbase : 1366 mm</li>
              <li>- Cooling : Liquid Cooled</li>
              <li>- Max Torque : 12 Nm @ 8000 rpm</li>
            </ul>
            <h2>Price : $1999.99<span>/hour</span></h2>
            <button class="btn2">Buy Now</button>
          </div>
          <div class="right">
            <div class="ani_image">
              <img src="image/bike2.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Script para inicializar Owl Carousel -->
    <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true, // Habilitar navegación
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            },
            navText: [
                "<i class='fas fa-chevron-left'></i>",
                "<i class='fas fa-chevron-right'></i>"
            ]
        });
    });
    </script>
</body>