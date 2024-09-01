<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuração de Compartilhamento de Recursos de Origem Cruzada (CORS)
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar suas configurações para compartilhamento de recursos de origem cruzada
    | ou "CORS". Isso determina quais operações de origem cruzada podem ser executadas
    | nos navegadores da web. Você está livre para ajustar estas configurações conforme necessário.
    |
    | Para saber mais: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */


    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
