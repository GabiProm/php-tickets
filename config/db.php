<?php

try {
    $conn = new PDO("sqlite:" . __DIR__ . "/../database/tickets.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado ✅<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
