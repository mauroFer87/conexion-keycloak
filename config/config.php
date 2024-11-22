<?php

return [
    'keycloak' => [
        'client_id' => 'your-client-id',               
        'client_secret' => 'your-client-secret',      
        'redirect_uri' => 'http://localhost:8080/callback', 
        'url_authorize' => 'http://localhost:8080/realms/{realm}/protocol/openid-connect/auth',
        'url_access_token' => 'http://localhost:8080/realms/{realm}/protocol/openid-connect/token',
        'url_user_info' => 'http://localhost:8080/realms/{realm}/protocol/openid-connect/userinfo',
    ]
];
