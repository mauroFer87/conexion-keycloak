<?php

session_start();

// Verifica si ya hay una sesión activa (si el usuario ya ha iniciado sesión con Keycloak)
if (isset($_SESSION['access_token'])) {
    header('Location: welcome.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mi Aplicación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="callback.php" method="post">
            <p>Para iniciar sesión, haz clic en el siguiente botón:</p>
            <a href="login_keycloak.php" class="btn-login">Iniciar con Keycloak</a>
        </form>
    </div>
</body>
</html>
