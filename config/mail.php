<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o mailer padrão que é usado para enviar qualquer email
    | mensagens enviadas por sua aplicação. Mailers alternativos podem ser configurados
    | e usados conforme necessário; no entanto, este mailer será usado por padrão.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Configurações do Mailer
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar todos os mailers usados pela sua aplicação mais
    | suas respectivas configurações. Vários exemplos foram configurados para
    | você e você pode adicionar os seus próprios conforme necessário.
    |
    | Laravel suporta uma variedade de "transportes" de correio a serem usados enquanto
    | enviando um e-mail. Você especificará qual está usando para seus
    | mailers abaixo. Você é livre para adicionar mailers adicionais conforme necessário.
    |
    | Suportado: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover", "roundrobin"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => null,
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Endereço Global "From"
    |--------------------------------------------------------------------------
    |
    | Você pode desejar que todos os e-mails enviados por sua aplicação sejam enviados de
    | o mesmo endereço. Aqui, você pode especificar um nome e endereço que é
    | usado globalmente para todos os e-mails enviados por sua aplicação.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Exemplo'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações do Mail Markdown
    |--------------------------------------------------------------------------
    |
    | Se você estiver usando renderização de email baseada em Markdown, você pode configurar seu
    | tema e caminhos de componentes aqui, permitindo que você personalize o design
    | dos emails. Ou, você pode simplesmente usar os padrões do Laravel!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
