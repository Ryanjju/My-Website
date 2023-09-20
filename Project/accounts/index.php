<?php include '../admin_check.php' ?>

<!DOCTYPE html>
<html lang="de">

<?php include '../head.php' ?>

<body>
    <?php include '../head.php';?>

    <main class="main">
        <div class="container">
            <div class="Panel-table">
                <?php
                // Konfigurationsdatei für Datenbankverbindung
                include '../login/db_connection.php';

                // Create connection
                $connection = new mysqli($host, $username, $password, $database);

                // Überprüfe die Verbindung
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Prepared Statement, um SQL-Injection zu verhindern
                $sql = "SELECT * FROM $table"; // get info about table from config file 
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                // HTML-Tabelle starten
                echo "<div class='container' style='--font-color: #000;'>";
                echo "<div class='panel-table'>";
                echo "<table class='table'>";
                echo "<tr><th>Username</th><th>privileges</th><th>Info</th></tr>";

                // Zeige Daten aus der Datenbank in der Tabelle an
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['username']}</td><td>{$row['privileges']}</td><td><a href='accounts/index.php?id={$row['id']}'>Info</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 Ergebnisse</td></tr>";
                }

                // HTML-Tabelle schließen
                echo "</table>";
                echo "</div>";
                echo "</div>";

                // Verbindung schließen
                $stmt->close();
                $connection->close();
                ?>
            </div>
        </div>
    </main>

    <?php include '../footer.php' ?>
</body>

</html>
