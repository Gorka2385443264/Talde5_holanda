<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
   // Inicialización de la variable $lang
   $lang = [];

   // Define el archivo de idioma en español por defecto
   $file_path = __DIR__ . "/lang/es.json";
   if (file_exists($file_path)) {
       $json_content = file_get_contents($file_path);
       if ($json_content !== false) {
           $decoded_json = json_decode($json_content, true);
           if (is_array($decoded_json)) {
               $lang = $decoded_json;
           }
       }
   }
    ?>
    <title><?php echo $lang['title'] ?? 'Fiets.hurr'; ?></title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/berriak.css">
</head>
<body>

<h1><?php echo $lang['header'] ?? 'Berriak'; ?></h1>


    <form action="berriak.php" method="get">
        <select name="order">
            <option value="DESC"><?php echo $lang['order_recent_first'] ?? '<?= trans("Recientes primer") ?>'  ?></option>
            <option value="ASC"><?php echo $lang['order_oldest_first'] ?? '<?= trans("Antiguos primer") ?>' ?></option>
        </select>
        <button type="submit"><?php echo $lang['submit_button'] ?? '<?= trans("Filtrar") ?>' ?></button>
        

    </form>

    <!-- Eliminados los botones de cambio de idioma -->
    <!-- Contenido de base de datos -->
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "1WMG2023";
    $dbname = "erronka3";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $order = $_GET['order'] ?? 'DESC'; // Default to DESC
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
        echo "<p>" . $lang['no_news'] . "</p>";
    }
    $conn->close();

    if (isset($_POST['changeLangToEnglish'])) {
        $lang = json_decode(file_get_contents(__DIR__ . "/lang/en.json"), true);
        setcookie('language', 'en', time() + 60*60*24*30, '/'); // La cookie expira en 30 días
        // Recarga la página
    }
    ?>

</body>
</html>


