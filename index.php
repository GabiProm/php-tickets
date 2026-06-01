<?php
include("config/db.php");

$stmt = $conn->query("SELECT * FROM tickets");

echo "<h1>Lista de Tickets</h1>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<p>";
    echo $row['titulo'] . " - " . $row['estado'];
    echo "</p>";
}
?>
