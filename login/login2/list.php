
<?php
session_start();

// Verificar si hay una sesión iniciada y si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    // Si el usuario no es administrador, redirigir a otra página (por ejemplo, index.php)
    header('Location: index.html?error=no-admin');
    alert('Tu no ere admin');
    exit(); // Detener la ejecución del script después de redirigir
}

require_once 'config.php';
$queryResult=$pdo->query("SELECT * FROM login");

?>
<html>
    <head>
        <title>
            List Users
        </title>
        <!-- CSS only Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper  bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </head>
    <style>
        body{
        background-image: url(https://i2.wp.com/hipertextual.com/wp-content/uploads/2021/06/Windows-11-Wallpaper-18-scaled.jpg?ssl=1);
        background-size: 70rem;
    }
    </style>
    <body>
        <div class="container">
            <h1>List Users</h1>
            <a href="index.html"> Home</a>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
  
                </tr>
                <tr>



                    <?php
                    while($row=$queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['usuario'].'</td>';
                        echo '<td>'.$row['password'].'</td>';
 
                        echo '</tr>';
                    }
                    ?>
                </tr>
                
            </table>
        </div>
    </body>
</html>