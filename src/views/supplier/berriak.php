<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berriak</title>
    <link rel="stylesheet" href="/src/css/berriak.css"> <!-- Ensure this path is correct -->
</head>
<body>

    <h1>Berriak</h1>

    <form action="berriak.php" method="get">
        <select name="order">
            <option value="DESC">Más reciente primero</option>
            <option value="ASC">Más antiguo primero</option>
        </select>
        <button type="submit">Ordenar</button>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "1WMG2023";
    $dbname = "erronka3";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Get the order parameter from the URL, default to DESC
    $order = $_GET['order'] ?? 'DESC';

    // Ensure the order parameter is safe to use in SQL
    $order = in_array($order, ['ASC', 'DESC']) ? $order : 'DESC';

    $sql = "SELECT * FROM berriak ORDER BY data $order";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['izena']) . "</h2>";
            echo "<p>" . nl2br(htmlspecialchars($row['edukia'])) . "</p>";
            echo "<p>Publicado el: " . date('d M Y', strtotime($row['data'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay noticias disponibles.</p>";
    }
    $conn->close();
    ?>
</body>
</html>
