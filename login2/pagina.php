<?php
session_start();

// Verificar si hay una sesión iniciada
if (isset($_SESSION['nombre'])) {
    // Verificar si el rol está almacenado en la sesión
    if (isset($_SESSION['rol'])) {
        // Si el rol está presente en la sesión, devolver el nombre de usuario y el rol en formato JSON
        echo json_encode(['nombre' => $_SESSION['nombre'], 'rol' => $_SESSION['rol']]);
    } else {
        // Si el rol no está presente en la sesión, devolver solo el nombre de usuario en formato JSON
        echo json_encode(['nombre' => $_SESSION['nombre']]);
    }
} else {
    // Si no hay sesión iniciada, devolver un arreglo vacío en formato JSON
    echo json_encode([]);
}
?>