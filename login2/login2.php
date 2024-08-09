<?php
// Activar la visualización de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbHost = 'db';
$dbName = 'mariadb';
$dbUser = 'mariadb';
$dbPass = 'mariadb';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Enviar un JSON de error en caso de fallo de conexión
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ERROR', 'message' => 'Error de conexión: ' . $e->getMessage()]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM login WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json'); // Establecer el tipo de contenido a JSON

    if ($usuario) {
        if (password_verify($password, $usuario['password'])) {
            session_start(); // Iniciar la sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['usuario'];
            $_SESSION['rol'] = $usuario['roles'];

            echo json_encode(['status' => 'OK']);
            exit();
        } else {
            echo json_encode(['status' => 'ERROR', 'message' => 'Contraseña incorrecta']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'ERROR', 'message' => 'Usuario no encontrado']);
        exit();
    }
} else {
    // Enviar un JSON de error si el método de solicitud no es POST
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ERROR', 'message' => 'Método de solicitud no válido']);
    exit();
}
?>