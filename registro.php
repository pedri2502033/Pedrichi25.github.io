<?php
$dbHost = 'localhost';
$dbName = 'test1';
$dbUser = 'root';
$dbPass = '';

try {
    // Conectar a la base de datos
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Terminar la ejecución del script si hay un error de conexión
}

// Verificar si el método de solicitud es POST (si se ha enviado el formulario de registro)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['txtnombre']; // Modifica el nombre del campo si es necesario
    $correo = $_POST['txtusuario'];
    $pass = $_POST['txtpassword'];

    // Validar los datos (puedes agregar más validaciones aquí)
    // Validar el correo electrónico con expresión regular
    // ...

    // Validar que la contraseña tenga al menos 8 caracteres
    if (strlen($pass) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres.";
        exit(); // Terminar la ejecución del script si la contraseña no tiene la longitud requerida
    }

    // Cifrar la contraseña antes de guardarla en la base de datos
    $pass_cifrado = password_hash($pass, PASSWORD_DEFAULT);

    // Insertar los datos en la base de datos
    try {
        $stmt = $pdo->prepare("INSERT INTO login (nombre, usuario, password) VALUES (:nombre, :usuario, :password)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $correo);
        $stmt->bindParam(':password', $pass_cifrado);
        $stmt->execute();
        
        // Redireccionar al usuario a la página de inicio de sesión después del registro
        header("Location: login2/login2.html");
        exit();
    } catch (PDOException $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    }
}
?>
