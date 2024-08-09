<?php
require_once 'config.php';

try {
    $queryResult = $pdo->query("SELECT usuario FROM login");
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al ejecutar la consulta: ' . $e->getMessage()]);
    exit();
}

// Inicializa un array para almacenar los resultados
$usuarios = [];

// Recorre los resultados de la consulta y agrega cada usuario al array
while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
    $usuarios[] = $row['usuario'];
}

// Establece el encabezado para devolver datos en formato JSON
header('Content-Type: application/json');

// Convierte el array a formato JSON y lo imprime
echo json_encode($usuarios);
?>