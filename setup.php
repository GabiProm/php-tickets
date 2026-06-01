<?php
include("config/db.php");
echo __DIR__;
$sql = "CREATE TABLE IF NOT EXISTS tickets (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT,
    descripcion TEXT,
    estado TEXT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($sql);

$conn->exec("INSERT INTO tickets (titulo, descripcion, estado) VALUES 
('Error login', 'No inicia sesión', 'Pendiente'),
('Bug reporte', 'No carga data', 'En proceso')");

echo "Tabla creada ✅";
