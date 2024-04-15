<?php
// Este bloque de PHP debería estar al inicio del archivo para manejar la sesión y la lógica del carrito
session_start();

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

    return array_key_exists($productoId, $productos) ? $productos[$productoId] : false;
}

if (isset($_POST['productoId'])) {
    $productoId = $_POST['productoId'];
    $producto = obtenerProductoPorId($productoId);
    if ($producto) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $producto;
        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
    exit;
}
?>

<!-- Aquí comienza el HTML y el resto del contenido -->
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php"); ?>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
    <link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">
    <title>Fiets.Huur</title>
</head>
<body>
    <div class="sidebar">
        <?php require_once (APP_DIR . "/src/views/supplier/sidebar.php"); ?>
    </div>
    <div class="mainDiv">
        <h1>Catálogo de Bicis</h1>
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
                    <h2>KTM 125 DUKE</h2>
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
            </div>
            <!-- Agrega más slides según sea necesario -->
        </div>
        <div class="arrow left">‹</div>
        <div class="arrow right">›</div>
    </div>
    <!-- Aquí sigue el resto de tu estructura HTML, incluyendo los productos -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.rent-now').click(function() {
                var productoId = $(this).data('producto-id');
                $.post('catalogo.php', { productoId: productoId }, function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        alert(data.message);
                        // Aquí podrías actualizar la interfaz, como mostrar un mensaje de confirmación o actualizar un contador de carrito
                    } else {
                        alert('Error al añadir el producto.');
                    }
                });
            });
        });
            $(document).ready(function() {
        $('.fas.fa-heart').click(function() {
            var $this = $(this);
            var productoId = $this.data('producto-id');
            if ($this.hasClass('active')) {
                $this.removeClass('active');
                // Aquí podrías llamar a una función para eliminar de favoritos en el backend
                console.log('Producto ' + productoId + ' eliminado de favoritos');
            } else {
                $this.addClass('active');
                // Aquí podrías llamar a una función para agregar a favoritos en el backend
                console.log('Producto ' + productoId + ' agregado a favoritos');
            }
        });

        $('.rent-now').click(function() {
            var productoId = $(this).data('producto-id');
            $.post('catalogo.php', { productoId: productoId }, function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Error al añadir el producto.');
                }
            });
        });
    });
    </script>
</body>
</html>
