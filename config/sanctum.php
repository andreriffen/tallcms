<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Domínios com Estado
    |--------------------------------------------------------------------------
    |
    | Solicitações dos seguintes domínios / hosts receberão cookies de autenticação de API com estado.
    | Tipicamente, estes devem incluir seus domínios local e de produção que acessam sua API via uma SPA frontend.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    /*
    |--------------------------------------------------------------------------
    | Guardas do Sanctum
    |--------------------------------------------------------------------------
    |
    | Este array contém os guardas de autenticação que serão verificados quando
    | o Sanctum estiver tentando autenticar uma solicitação. Se nenhum desses guardas
    | conseguir autenticar a solicitação, o Sanctum usará o token de portador
    | presente em uma solicitação recebida para autenticação.
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Minutos de Expiração
    |--------------------------------------------------------------------------
    |
    | Este valor controla o número de minutos até que um token emitido seja
    | considerado expirado. Isso substituirá qualquer valor definido no atributo
    | "expires_at" do token, mas as sessões de primeira parte não são afetadas.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Prefixo do Token
    |--------------------------------------------------------------------------
    |
    | Sanctum pode prefixar novos tokens para aproveitar numerosas
    | iniciativas de verificação de segurança mantidas por plataformas de código aberto
    | que notificam os desenvolvedores se eles comprometerem tokens em repositórios.
    |
    | Veja: https://docs.github.com/en/code-security/secret-scanning/about-secret-scanning
    |
    */

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Middleware do Sanctum
    |--------------------------------------------------------------------------
    |
    | Ao autenticar sua SPA de primeira parte com o Sanctum, você pode precisar
    | personalizar alguns dos middlewares que o Sanctum usa ao processar a
    | solicitação. Você pode alterar os middlewares listados abaixo conforme necessário.
    |
    */

    'middleware' => [
        'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
    ],

];

