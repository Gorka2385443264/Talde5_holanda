<?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php"); ?>
<link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
<link rel="stylesheet" href="/Talde5_holanda/src/css/cesta.css">
<title>Cesta de Compra</title>
</head>

<body>
    <?php
    // Inicializa el carrito si no está ya en la sesión
    $carrito = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = 0;

    // Si se recibe una actualización de las horas via AJAX
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['index']) && isset($_POST['hours'])) {
        if (isset($carrito[$_POST['index']])) {
            $carrito[$_POST['index']]['hours'] = intval($_POST['hours']);
            $_SESSION['cart'] = $carrito; // Guardar el cambio en la sesión
            echo json_encode(['success' => true]); // Responder a la solicitud AJAX
            exit; // Finalizar la ejecución del script para no generar salida HTML
        }
    }

    // Manejar la eliminación de un producto del carrito
    if (isset($_GET['remove']) && isset($carrito[$_GET['remove']])) {
        unset($carrito[$_GET['remove']]);
        $_SESSION['cart'] = $carrito; // Actualizar el carrito en la sesión
        header("Location: cesta.php"); // Redireccionar para evitar re-post
        exit();
    }

    // Manejar la adición de productos al carrito
    if (isset($_POST['productoId']) && !isset($_POST['action'])) {
        $productoId = $_POST['productoId'];
        $producto = obtenerProductoPorId($productoId);
        if ($producto) {
            $producto['price'] = $producto['prezioa']; // Definir la clave "price"
            $producto['name'] = $producto['mota']; // Definir la clave "name"
            $_SESSION['cart'][$productoId] = $producto;
            echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
        }
        exit;
    }

    ?>

    <div class="mainDiv">
        <h1><?= trans("Cesta_de_compra") ?></h1>
        <?php if (empty($carrito)): ?>
            <p><?= trans("Tu cesta esta vacia") ?>. <a href="catalogo.php"><?= trans("Volver al catalogo") ?>.</a></p>
        <?php else: ?>
            <table>
                <tr>
                    <th><?= trans("Producto") ?></th>
                    <th><?= trans("Precio_") ?></th>
                    <th><?= trans("Horas") ?></th>
                    <th><?= trans("Accion") ?></th>
                    <th><?= trans("Total") ?></th>
                </tr>
                <?php foreach ($carrito as $index => $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars(isset($item['name']) ? $item['name'] : ''); ?></td>
                        <td id="price_<?php echo $index; ?>">
                            $<?php echo isset($item['price']) ? number_format($item['price'], 2) : ''; ?></td>
                        <td>
                            <select id="hours_<?php echo $index; ?>" onchange="updateSubtotal(<?php echo $index; ?>)">
                                <?php for ($h = 1; $h <= 12; $h++): ?>
                                    <option value="<?php echo $h; ?>" <?php if (isset($item['hours']) && $h == $item['hours'])
                                           echo 'selected'; ?>>
                                        <?php echo $h; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td><a href="cesta.php?remove=<?php echo $index; ?>" class="button"><?= trans("ElimButt") ?></a></td>
                        <td id="subtotal_<?php echo $index; ?>" class="subtotal">
                            $<?php echo isset($item['price']) && isset($item['hours']) ? number_format($item['price'] * $item['hours'], 2) : ''; ?>
                        </td>
                    </tr>
                    <?php
                    if (isset($item['price']) && isset($item['hours'])) {
                        $total += $item['price'] * $item['hours'];
                    }
                    ?>
                <?php endforeach; ?>
                <tr>
                    <th><?= trans("Total") ?></th>
                    <th colspan="4" id="total">$<?php echo number_format($total, 2); ?></th>
                </tr>
            </table>
            <div>
                <a href="catalogo.php" class="button"><?= trans("Continuar comprando") ?></a>
                <a href="pago.php" class="button"><?= trans("Pay") ?></a>
            </div>
        <?php endif; ?>
    </div>

    <?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php"); ?>
    <script>
        $(document).ready(function () {
            $('select[id^="hours_"]').change(function () {
                var index = this.id.split('_')[1];
                var hours = $(this).val();
                var price = parseFloat($('#price_' + index).text().replace('$', ''));
                var subtotal = price * hours;
                $('#subtotal_' + index).text('$' + subtotal.toFixed(2));

                // Enviar los cambios al servidor para actualizar la sesión
                $.post('cesta.php', { index: index, hours: hours }, function (response) {
                    console.log(response); // Puedes quitar esto después de confirmar que funciona
                });

                updateTotal(); // Actualizar el total general
            });
        });

        function updateSubtotal(index) {
            var price = parseFloat(document.getElementById('price_' + index).innerText.replace('$', ''));
            var hours = parseInt(document.getElementById('hours_' + index).value);
            var subtotal = price * hours;
            document.getElementById('subtotal_' + index).innerText = '$' + subtotal.toFixed(2);
            updateTotal();
        }

        function updateTotal() {
            var total = 0;
            var subtotals = document.getElementsByClassName('subtotal');
            for (var i = 0; i < subtotals.length; i++) {
                total += parseFloat(subtotals[i].innerText.replace('$', ''));
            }
            document.getElementById('total').innerText = '$' + total.toFixed(2);
        }
    </script>
</body>

</html>