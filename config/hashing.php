<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de Hash Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o driver de hash padrão que será usado para hash
    | senhas para sua aplicação. Por padrão, o algoritmo bcrypt é
    | usado; no entanto, você permanece livre para modificar esta opção se desejar.
    |
    | Suportado: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Opções do Bcrypt
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar as opções de configuração que devem ser usadas quando
    | as senhas são hashadas usando o algoritmo Bcrypt. Isso permitirá que você
    | controle o tempo necessário para hash da senha fornecida.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Opções do Argon
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar as opções de configuração que devem ser usadas quando
    | as senhas são hashadas usando o algoritmo Argon. Isso permitirá que você
    | controle o tempo necessário para hash da senha fornecida.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
        'verify' => true,
    ],

];
