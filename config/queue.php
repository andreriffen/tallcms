<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nome Padrão da Conexão de Fila
    |--------------------------------------------------------------------------
    |
    | A API de filas do Laravel suporta uma variedade de back-ends por meio de um
    | API, dando-lhe acesso conveniente a cada back-end usando a mesma
    | sintaxe para todos. Aqui você pode definir uma conexão padrão.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Conexões de Fila
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar as informações de conexão para cada servidor que
    | é usado por sua aplicação. Uma configuração padrão foi adicionada
    | para cada back-end enviado com o Laravel. Você é livre para adicionar mais.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Agrupamento de Trabalhos em Lotes
    |--------------------------------------------------------------------------
    |
    | As opções a seguir configuram o banco de dados e a tabela que armazenam informações de agrupamento de trabalhos.
    | Essas opções podem ser atualizadas para qualquer conexão de banco de dados
    | e tabela que foi definida por sua aplicação.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Trabalhos de Fila Falhados
    |--------------------------------------------------------------------------
    |
    | Estas opções configuram o comportamento do registro de trabalhos de fila falhados para que você
    | possa controlar qual banco de dados e tabela são usados para armazenar os trabalhos que
    | falharam. Você pode alterá-los para qualquer banco de dados / tabela que desejar.
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
