<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Nome da Conexão de Banco de Dados Padrão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual das conexões de banco de dados abaixo você deseja
    | usar como sua conexão padrão para todo o trabalho de banco de dados. Claro
    | você pode usar muitas conexões ao mesmo tempo usando a biblioteca de Banco de Dados.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Conexões de Banco de Dados
    |--------------------------------------------------------------------------
    |
    | Aqui estão cada uma das conexões de banco de dados configuradas para o seu aplicativo.
    | Claro, exemplos de configuração de cada plataforma de banco de dados que é
    | suportado pelo Laravel é mostrado abaixo para facilitar o desenvolvimento.
    |
    |
    | T.odo o trabalho de banco de dados no Laravel é feito através das facilidades do PHP PDO
    | então certifique-se de ter o driver para seu banco de dados específico
    | de escolha instalado em sua máquina antes de começar o desenvolvimento.
    |
    */


    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'tallcms'),
            'username' => env('DB_USERNAME', 'laravel_user'),
            'password' => env('DB_PASSWORD', 'strong_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => 'InnoDB',
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'tallcms'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'tallcms'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

   /*
    |--------------------------------------------------------------------------
    | Tabela do Repositório de Migração
    |--------------------------------------------------------------------------
    |
    | Esta tabela mantém o controle de todas as migrações que já foram executadas para
    | seu aplicativo. Usando estas informações, podemos determinar quais
    | das migrações no disco ainda não foram realmente executadas no banco de dados.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Bancos de Dados Redis
    |--------------------------------------------------------------------------
    |
    | Redis é um armazenamento de valor-chave avançado, rápido e de código aberto que também
    | fornece um corpo mais rico de comandos do que um sistema de valor-chave típico
    | como APC ou Memcached. Laravel facilita a utilização.
    |
    */


    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'tallcms'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
