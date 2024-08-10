<?php
require_once 'config.php';

try {
    $queryResult = $pdo->query("SELECT usuario FROM login");
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al ejecutar la consulta: ' . $e->getMessage()]);
    exit();
}


$usuarios = [];


while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
    $usuarios[] = $row['usuario'];
}


header('Content-Type: application/json');


echo json_encode($usuarios);
?>