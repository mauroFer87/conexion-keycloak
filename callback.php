<?php

require_once '../vendor/autoload.php';

use League\OAuth2\Client\Provider\GenericProvider;

session_start();

// Cargar configuración de Keycloak
$config = include('../config/config.php');
$keycloakConfig = $config['keycloak'];

// Configurar el proveedor OAuth2 para Keycloak
$provider = new GenericProvider([
    'clientId'                => $keycloakConfig['client_id'],
    'clientSecret'            => $keycloakConfig['client_secret'],
    'redirectUri'             => $keycloakConfig['redirect_uri'],
    'urlAuthorize'            => $keycloakConfig['url_authorize'],
    'urlAccessToken'          => $keycloakConfig['url_access_token'],
    'urlResourceOwnerDetails' => $keycloakConfig['url_user_info']
]);

// Verificar si el código de autorización y el estado son correctos
if (empty($_GET['code']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    exit('Error: el estado no coincide');
}

try {
    // Obtener el token de acceso usando el código
    $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Obtener la información del usuario
    $resourceOwner = $provider->getResourceOwner($accessToken);

    // Guardar la información del usuario en la sesión
    $_SESSION['access_token'] = $accessToken->getToken();
    $_SESSION['user_email'] = $resourceOwner->getEmail();

    // Redirigir al usuario a la página de bienvenida
    header('Location: welcome.php');
    exit();

} catch (Exception $e) {
    exit('Error al obtener el token de acceso: ' . $e->getMessage());
}
?>
