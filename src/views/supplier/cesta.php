


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
?>

    <div class="mainDiv">
        <h1>Cesta de la Compra</h1>
        <?php if (count($carrito) > 0): ?>
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Precio por Hora</th>
                    <th>Horas</th>
                    <th>Acción</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($carrito as $index => $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td id="price_<?php echo $index; ?>">$<?php echo number_format($item['price'], 2); ?></td>
                        <td>
                            <select id="hours_<?php echo $index; ?>" onchange="updateSubtotal(<?php echo $index; ?>)">
                                <?php for ($h = 1; $h <= 12; $h++): ?>
                                    <option value="<?php echo $h; ?>" <?php if ($h == (isset($item['hours']) ? $item['hours'] : 1)) echo 'selected'; ?>>
                                        <?php echo $h; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td><a href="cesta.php?remove=<?php echo $index; ?>" class="button">Eliminar</a></td>
                        <td id="subtotal_<?php echo $index; ?>" class="subtotal">$<?php echo number_format($item['price'] * (isset($item['hours']) ? $item['hours'] : 1), 2); ?></td>
                    </tr>
                    <?php $total += $item['price'] * (isset($item['hours']) ? $item['hours'] : 1); ?>
                <?php endforeach; ?>
                <tr>
                    <th>Total</th>
                    <th colspan="4" id="total">$<?php echo number_format($total, 2); ?></th>
                </tr>
            </table>
            <div>
                <a href="catalogo.php" class="button">Continuar Comprando</a>
                <a href="pago.php" class="button">Proceder al Pago</a>
            </div>
        <?php else: ?>
            <p>Tu cesta está vacía. <a href="catalogo.php">Volver al catálogo.</a></p>
        <?php endif; ?>
    </div>
    <?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php"); ?>
    <script>
    $(document).ready(function() {
        $('select[id^="hours_"]').change(function() {
            var index = this.id.split('_')[1];
            var hours = $(this).val();
            var price = parseFloat($('#price_' + index).text().replace('$', ''));
            var subtotal = price * hours;
            $('#subtotal_' + index).text('$' + subtotal.toFixed(2));

            // Enviar los cambios al servidor para actualizar la sesión
            $.post('cesta.php', { index: index, hours: hours }, function(response) {
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
