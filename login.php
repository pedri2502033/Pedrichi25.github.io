<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test1";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexion madafaka: " . mysqli_connect_error());
}

try {
    // Conectar a la base de datos
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Terminar la ejecución del script si hay un error de conexión
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '" . $nombre . "'");
$usuario = mysqli_fetch_assoc($query);

if ($usuario) {
    // Verificar la contraseña utilizando password_verify
    if (password_verify($pass, $usuario['password'])) {
        // Contraseña correcta
        header("Location: index.html");
        exit();
    } else {
        // Contraseña incorrecta
        header("Location: login.html");
        exit();
    }
} else {
    // Usuario no encontrado
    header("Location: registrar.html");
    exit();
}
?>