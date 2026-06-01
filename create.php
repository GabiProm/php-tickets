<?php
include("config/db.php");

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];

    // Validación básica
    if ($titulo == "" || $descripcion == "" || $estado == "") {
        echo "Todos los campos son obligatorios ❌";
    } else {
        $sql = "INSERT INTO tickets (titulo, descripcion, estado) VALUES (:titulo, :descripcion, :estado)";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':estado', $estado);

        $stmt->execute();
        
        // Redirigir al index
        header("Location: index.php");
        exit();
    }
}
?>

<h1>Crear Ticket</h1>

<form method="POST">
    <label>Titulo:</label><br>
    <input type="text" name="titulo"><br><br>

    <label>Descripcion:</label><br>
    <input type="text" name="descripcion"><br><br>

    <label>Estado:</label><br>
    <select name="estado">
        <option value="Pendiente">Pendiente</option>
        <option value="En proceso">En proceso</option>
        <option value="Resuelto">Resuelto</option>
    </select><br><br>

    <button type="submit">Guardar</button>
</form>