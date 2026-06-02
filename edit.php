<?php
include("config/db.php");

// Obtener ID desde URL
$id = $_GET['id'];

// Obtener datos actuales
$sql = "SELECT * FROM tickets WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$ticket = $stmt->fetch(PDO::FETCH_ASSOC);

// Si envían formulario (UPDATE)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];

    if ($titulo == "" || $descripcion == "" || $estado == "") {
        echo "Todos los campos son obligatorios ❌";
    } else {

        $sql = "UPDATE tickets 
                SET titulo = :titulo, descripcion = :descripcion, estado = :estado
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}
?>

<h1>Editar Ticket</h1>

<form method="POST">

    <label>Titulo:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($ticket['titulo']) ?>"><br><br>

    <label>Descripcion:</label><br>
    <input type="text" name="descripcion" value="<?= htmlspecialchars($ticket['descripcion']) ?>"><br><br>

    <label>Estado:</label><br>
    <select name="estado">
        <option value="Pendiente" <?= $ticket['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="En proceso" <?= $ticket['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
        <option value="Resuelto" <?= $ticket['estado'] == 'Resuelto' ? 'selected' : '' ?>>Resuelto</option>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>