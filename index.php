<?php
include("config/db.php");

// Consulta
$stmt = $conn->query("SELECT * FROM tickets");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Tickets</title>
</head>
<body>

<h1>📋 Lista de Tickets</h1>

<a href="create.php">➕ Crear nuevo ticket</a>

<hr>

<?php
// Mostrar tickets directamente (sin rowCount porque SQLite falla ahí)
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<p>";
    echo "<strong>" . htmlspecialchars($row['titulo']) . "</strong><br>";
    echo htmlspecialchars($row['descripcion']) . "<br>";
    echo "Estado: " . htmlspecialchars($row['estado']) . "<br>";
    echo "Fecha: " . $row['fecha_creacion'];
    echo "<a href='edit.php?id=" . $row['id'] . "'>✏️ Editar</a>";
    echo " | <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Eliminar este ticket?\")'>🗑️ Eliminar</a>";
    echo "</p>";

    echo "<hr>";
}
?>

</body>
</html>
