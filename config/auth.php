<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autenticação Padrões
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o "guarda" de autenticação padrão e as opções de redefinição de senha
    | para sua aplicação. Você pode alterar esses padrões conforme necessário,
    | mas eles são um começo perfeito para a maioria das aplicações.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guardas de Autenticação
    |--------------------------------------------------------------------------
    |
    | Em seguida, você pode definir cada guarda de autenticação para sua aplicação.
    | Claro, uma ótima configuração padrão foi definida para você
    | aqui, que usa armazenamento de sessão e o provedor de usuário Eloquent.
    |
    | Todos os drivers de autenticação têm um provedor de usuário. Isso define como os
    | usuários são realmente recuperados de seu banco de dados ou de outros mecanismos
    | de armazenamento usados por esta aplicação para persistir os dados do usuário.
    |
    | Suportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provedores de Usuário
    |--------------------------------------------------------------------------
    |
    | Todos os drivers de autenticação têm um provedor de usuário. Isso define como os
    | usuários são realmente recuperados de seu banco de dados ou de outros mecanismos
    | de armazenamento usados por esta aplicação para persistir os dados do usuário.
    |
    | Se você tiver várias tabelas ou modelos de usuários, poderá configurar várias
    | fontes que representam cada modelo / tabela. Essas fontes podem então
    | ser atribuídas a quaisquer guardas de autenticação extras que você tenha definido.
    |
    | Suportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redefinição de Senhas
    |--------------------------------------------------------------------------
    |
    | Você pode especificar várias configurações de redefinição de senha se tiver mais
    | de uma tabela ou modelo de usuário na aplicação e desejar ter
    | configurações de redefinição de senha separadas com base nos tipos de usuário específicos.
    |
    | O tempo de expiração é o número de minutos que cada token de redefinição será
    | considerado válido. Esse recurso de segurança mantém os tokens com curta duração para que
    | tenham menos tempo para serem adivinhados. Você pode alterar isso conforme necessário.
    |
    | A configuração de throttle é o número de segundos que um usuário deve esperar antes de
    | gerar mais tokens de redefinição de senha. Isso impede que o usuário
    | gere rapidamente uma quantidade muito grande de tokens de redefinição de senha.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tempo Limite de Confirmação de Senha
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir a quantidade de segundos antes que uma confirmação de senha
    | expire e o usuário seja solicitado a inserir novamente sua senha via
    | tela de confirmação. Por padrão, o tempo limite dura três horas.
    |
    */

    'password_timeout' => 10800,

];
