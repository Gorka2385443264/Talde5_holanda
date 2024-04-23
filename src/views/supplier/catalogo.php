<?php
// Conexión a la base de datos
$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener los productos desde la base de datos
function obtenerProductoPorId($productoId, $conn)
{
    if (!empty($productoId)) {
        $sql = "SELECT * FROM bizikleta WHERE id_bizikleta = $productoId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    } else {
        return false;
    }
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
    $producto = obtenerProductoPorId($productoId, $conn);
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

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/categoria.css">

<head>

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
                    <?php
                    // Consulta SQL para obtener los datos de las bicicletas
                    $sql = "SELECT * FROM bizikleta";
                    $result = $conn->query($sql);

                    // Mostrar los datos de las bicicletas
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='box'>";
                            echo "<div class='img'><img src='" . $row['imagen'] . "' width='300'></div>";
                            echo "<div class='detalis'>";
                            echo "<h3>" . $row['mota'] . "</h3>";
                            echo "<p>" . $row['descripcion'] . "</p>";
                            echo "<h2>$" . $row['prezioa'] . " <span>/hora</span> </h2>";
                            if (isset($row['id_bizikleta'])) {
                                echo "<button class='rent-now' data-producto-id='" . $row['id_bizikleta'] . "'>Rent now</button>";
                            } else {
                                echo "<button class='rent-now' data-producto-id=''>Rent now</button>"; // O algún otro valor predeterminado
                            }
                            echo "</div>";
                            echo "</div>";
                        }

                    } else {
                        echo "No se encontraron bicicletas";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/barraDeAbajo.php"); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.rent-now').click(function () {
                var productoId = $(this).data('producto-id');

                $.post('catalogo.php', { productoId: productoId }, function (response) {
                    console.log(response); // Verificar la respuesta del servidor en la consola del navegador
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
    </script>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>