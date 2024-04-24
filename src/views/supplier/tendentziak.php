<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berriak</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/tendentziak.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <h1><?= trans("Tendentziak") ?></h1>
    <table>
        <thead>
            <tr>
                <th><?= trans("ID") ?></th>
                <th><?= trans("Izen") ?></th>
                <th><?= trans("Deskription") ?></th>
                <th><?= trans("Popularitatea") ?></th>
                <th><?= trans("Data:") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "1WMG2023";
            $dbname = "erronka3"; // Replace with your actual database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM erronka3.tendentziak ORDER BY id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    // Determine color based on popularity
                    $color = '#FFFFFF'; // Default white background
                    if ($row["popularitatea"] >= 90) {
                        $color = '#99FF99'; // Red for high popularity
                    } elseif ($row["popularitatea"] >= 75) {
                        $color = '#FFFF99'; // Yellow for medium popularity
                    } elseif ($row["popularitatea"] >= 50) {
                        $color = '#FF9999'; // Green for lower popularity
                    }

                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . htmlspecialchars($row["izena"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["deskripzioa"]) . "</td>";
                    echo "<td style='background-color: $color;'>" . $row["popularitatea"] . "</td>";
                    echo "<td>" . $row["data"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

