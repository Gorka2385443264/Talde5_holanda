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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "1WMG2023";
    $dbname = "erronka3";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM berriak ORDER BY data DESC";
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
    <?php
    require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");
    ?>
</body>
</html>
