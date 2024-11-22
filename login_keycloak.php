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

// Redirigir al usuario a Keycloak para autenticarse
$authorizationUrl = $provider->getAuthorizationUrl();
$_SESSION['oauth2state'] = $provider->getState();
header('Location: ' . $authorizationUrl);
exit();
