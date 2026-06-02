<?php
include("config/db.php");

// Obtener ID desde la URL
$id = $_GET['id'];

// Eliminar ticket
$sql = "DELETE FROM tickets WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redirigir al index
header("Location: index.php");
exit();