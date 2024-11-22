<?php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

// Obtener la información del usuario de la sesión
$accessToken = $_SESSION['access_token'];

// Mostrar información del usuario
echo '¡Bienvenido!<br>';
echo 'Correo electrónico: ' . $_SESSION['user_email'] . '<br>';
echo '<a href="logout.php">Cerrar sesión</a>';
?>
