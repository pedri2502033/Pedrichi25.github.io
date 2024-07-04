<?php
session_start();

// Destruir la sesión
session_destroy();

// Devolver una respuesta exitosa
http_response_code(200);
?>