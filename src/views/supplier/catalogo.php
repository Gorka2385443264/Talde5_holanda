<?php
/*
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

// Inicializar el carrito si no existe en la sesión
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Inicializar los favoritos si no existen en la sesión
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

// Manejar la adición de productos al carrito
if (isset($_POST['productoId']) && !isset($_POST['action'])) {
    $productoId = $_POST['productoId'];
    $producto = obtenerProductoPorId($productoId);
    if ($producto) {
        $_SESSION['cart'][$productoId] = $producto;
        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
    exit;
}

// Manejar la acción de favoritos
if (isset($_POST['action']) && $_POST['action'] == 'toggleFavorite') {
    $productId = $_POST['productId'];
    if (isset($_SESSION['favorites'][$productId])) {
        unset($_SESSION['favorites'][$productId]);
    } else {
        $_SESSION['favorites'][$productId] = $productId;
    }
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'favorites' => array_keys($_SESSION['favorites'])]);
    exit;
}
*/

/* <!DOCTYPE html>
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
        <button id="showFavorites">Mostrar Favoritos</button>
        <div id="favoritesContainer" style="display: none;">
            <h2>Mis Favoritos</h2>
            <ul id="favoritesList">
            
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
                        <button class="rent-now" data-producto-id="1">Rent now</button>
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
                        <button class="rent-now" data-producto-id="2">Rent now</button>
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
                        <button class="rent-now" data-producto-id="3">Rent now</button>
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
                    <div the="img">
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
                        <button class="rent-now" data-producto-id="5">Rent now</button>
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
                        <button class="rent-now" data-producto-id="6">Rent now</button>
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
                    <button class="rent-now" data-producto-id="7">Rent now</button>

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
                    <button class="rent-now" data-producto-id="8">Rent now</button>

                </div>
                <img src="../../../public/Argazkiak/doble-removebg-preview.png" alt="">
            </div>
            <!-- Agrega más slides según sea necesario -->
        </div>
        <div class="arrow left">‹</div>
        <div class="arrow right">›</div>
    </div>
                <?php foreach ($_SESSION['favorites'] as $productId): ?>
                    <li><?= obtenerProductoPorId($productId)['name'] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php foreach ($_SESSION['cart'] as $producto): ?>
        <div class="product-box">
            <div class="img">
                <img src="../../../public/Argazkiak/<?= strtolower(str_replace(' ', '-', $producto['name'])) ?>-removebg-preview.png" width="300">
            </div>
            <div class="detalis">
                <h3><?= $producto['name'] ?></h3>
                <p>Detalles del producto</p>
                <h2>$<?= $producto['price'] ?><span>/hour</span></h2>
                <button class="rent-now" data-producto-id="<?= $producto['id'] ?>">Rent now</button>
                <i class="fas fa-heart favorito <?php if (isset($_SESSION['favorites'][$producto['id']])) echo 'active'; ?>" data-producto-id="<?= $producto['id'] ?>"></i>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#showFavorites').click(function() {
                $('#favoritesContainer').toggle();
            });

            $('.favorito').click(function() {
                var $this = $(this);
                var productoId = $this.data('producto-id');
                $.post('<?= $_SERVER['PHP_SELF']; ?>', { action: 'toggleFavorite', productId: productoId }, function(response) {
                    if (response.success) {
                        $this.toggleClass('active');
                        // Actualizar la lista de favoritos
                        $('#favoritesList').empty();
                        response.favorites.forEach(function(id) {
                            var name = obtenerProductoPorId(id)['name']; // Debes reemplazar esto con el método adecuado para obtener el nombre del producto
                            $('#favoritesList').append('<li>' + name + '</li>');
                        });
                    }
                }, 'json');
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
</html> */


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

// Inicializar el carrito si no existe en la sesión
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Manejar la adición de productos al carrito
if (isset($_POST['productoId']) && !isset($_POST['action'])) {
    $productoId = $_POST['productoId'];
    $producto = obtenerProductoPorId($productoId);
    if ($producto) {
        $_SESSION['cart'][$productoId] = $producto;
        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
    exit;
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
            <div class="arrow left">‹</div>
        <div class="arrow right">›</div>
            </div>
        </section>

        <div class="slider-container">
            <!-- Deslizadores y contenido similar aquí -->
        </div>

        <?php foreach ($_SESSION['cart'] as $producto): ?>
        <div class="product-box">
            <div class="img">
                <img src="../../../public/Argazkiak/<?= strtolower(str_replace(' ', '-', $producto['name'])) ?>-removebg-preview.png" width="300">
            </div>
            <div class="detalis">
                <h3><?= $producto['name'] ?></h3>
                <p>Detalles del producto</p>
                <h2>$<?= $producto['price'] ?><span>/hour</span></h2>
                <button class="rent-now" data-producto-id="<?= $producto['id'] ?>">Rent now</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
        $(document).ready(function() {
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
