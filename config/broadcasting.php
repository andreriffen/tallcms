<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Transmissor Padrão (Default Broadcast)
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o transmissor padrão que será usado pelo
    | framework quando um evento precisar ser transmitido. Você pode definir
    | isto para qualquer uma das conexões definidas no array "connections" abaixo.
    |
    | Suportado: "pusher", "ably", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Conexões de Transmissão (Broadcast Connections)
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todas as conexões de transmissão que serão usadas
    | para transmitir eventos para outros sistemas ou sobre websockets. Exemplos de
    | cada tipo de conexão disponível são fornecidos dentro deste array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'host' => env('PUSHER_HOST') ?: 'api-'.env('PUSHER_APP_CLUSTER', 'mt1').'.pusher.com',
                'port' => env('PUSHER_PORT', 443),
                'scheme' => env('PUSHER_SCHEME', 'https'),
                'encrypted' => true,
                'useTLS' => env('PUSHER_SCHEME', 'https') === 'https',
            ],
            'client_options' => [
                // Opções do cliente Guzzle: https://docs.guzzlephp.org/en/stable/request-options.html
            ],
        ],

        'ably' => [
            'driver' => 'ably',
            'key' => env('ABLY_KEY'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
