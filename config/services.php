<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Serviços de Terceiros
    |--------------------------------------------------------------------------
    |
    | Este arquivo destina-se a armazenar as credenciais para serviços de terceiros
    | como Mailgun, Postmark, AWS e outros. Este arquivo fornece o local de fato
    | para este tipo de informação, permitindo que pacotes tenham
    | um arquivo convencional para localizar as várias credenciais de serviço.
    |
    */


    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
