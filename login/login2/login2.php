<?php
// Configuración de la base de datos
$dbHost = 'localhost';
$dbName = 'test1';
$dbUser = 'root';
$dbPass = '';

// Conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Finalizar el script si hay un error de conexión
}

// Verificar si el método de solicitud es POST (si se ha enviado el formulario de inicio de sesión)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $pass = $_POST['password'];

    // Buscar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM login WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar la contraseña utilizando password_verify
        if (password_verify($pass, $usuario['password'])) {
            // Contraseña correcta
            echo json_encode(['status' => 'OK']);
            exit();
        } else {
            // Contraseña incorrecta
            echo json_encode(['status' => 'ERROR', 'message' => 'Contraseña incorrecta']);
            exit();
        }
    } else {
        // Usuario no encontrado
        echo json_encode(['status' => 'ERROR', 'message' => 'Usuario no encontrado']);
        exit();
    }
}
?>
