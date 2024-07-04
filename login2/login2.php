<?php
$dbHost = 'localhost';
$dbName = 'test1';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM login WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if (password_verify($pass, $usuario['password'])) {
            session_start(); // Iniciar la sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['usuario'];
            // Obtener el rol del usuario desde la tabla "login"
            $rol = $usuario['roles'];

            $_SESSION['rol'] = $rol;

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
}
?>
