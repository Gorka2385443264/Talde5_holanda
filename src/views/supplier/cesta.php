<?php
session_start();

// Verificar si el carrito está vacío o no
$carrito = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php"); ?>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
    <link rel="stylesheet" href="/Talde5_holanda/src/css/cesta.css">
    <title>Cesta de Compra</title>
</head>
<body>
    <div class="sidebar">
        <?php require_once (APP_DIR . "/src/views/supplier/sidebar.php"); ?>
    </div>
    <div class="mainDiv">
        <h1>Cesta de la Compra</h1>
        <?php if (count($carrito) > 0): ?>
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
                <?php foreach ($carrito as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                </tr>
                <?php $total += $item['price']; ?>
                <?php endforeach; ?>
                <tr>
                    <th>Total</th>
                    <th>$<?php echo number_format($total, 2); ?></th>
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
</body>
</html>
