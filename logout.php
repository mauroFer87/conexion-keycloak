<?php

session_start();

// Eliminar los datos de la sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio de sesión
header('Location: index.php');
exit();
?>
