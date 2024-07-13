<?php
header('Content-Type: application/json');

$numeros = array();
for ($i = 1; $i <= 10; $i++) {
    $numeros[] = $i;
    
}

$numeros2 = array();
for ($p = 10; $p >= 1; $p--){
    $numeros2[] = $p;
}

echo json_encode($numeros);
echo json_encode($numeros2);
?>