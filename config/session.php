<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de Sessão Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o driver de sessão padrão que será usado em
    | requisições. Por padrão, usaremos o driver nativo leve, mas
    | você pode especificar qualquer um dos outros maravilhosos drivers fornecidos aqui.
    |
    | Suportados: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Duração da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o número de minutos que deseja que a sessão
    | permaneça inativa antes de expirar. Se desejar que eles
    | expirem imediatamente ao fechar o navegador, defina essa opção.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Criptografia da Sessão
    |--------------------------------------------------------------------------
    |
    | Esta opção permite que você especifique facilmente que todos os dados de sua sessão
    | devem ser criptografados antes de serem armazenados. Toda a criptografia será executada
    | automaticamente pelo Laravel e você pode usar a Sessão como normalmente.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Localização do Arquivo de Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar o driver de sessão nativo, precisamos de um local onde os arquivos de sessão
    | possam ser armazenados. Um padrão foi definido para você, mas um diferente
    | localização pode ser especificada. Isso é necessário apenas para sessões de arquivo.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexão do Banco de Dados da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar os drivers de sessão "database" ou "redis", você pode especificar uma
    | conexão que deve ser usada para gerenciar essas sessões. Isso deve
    | corresponder a uma conexão nas opções de configuração do seu banco de dados.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabela do Banco de Dados da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar o driver de sessão "database", você pode especificar a tabela que
    | deve ser usada para gerenciar as sessões. Claro, um padrão sensato é
    | fornecido para você; no entanto, você está livre para alterar isso conforme necessário.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Armazenamento em Cache da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar um dos back-ends de sessão baseados em cache do framework, você pode
    | listar um armazenamento em cache que deve ser usado para essas sessões. Este valor
    | deve corresponder a um dos "stores" de cache configurados da aplicação.
    |
    | Afeta: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Sorteio de Limpeza de Sessão
    |--------------------------------------------------------------------------
    |
    | Alguns drivers de sessão devem limpar manualmente sua localização de armazenamento para obter
    | se livrar de sessões antigas do armazenamento. Aqui estão as chances de que isso aconteça
    | em uma determinada solicitação. Por padrão, as chances são de 2 em 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nome do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode alterar o nome do cookie usado para identificar uma sessão
    | por ID. O nome especificado aqui será usado sempre que um
    | novo cookie de sessão for criado pelo framework para cada driver.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'placehub'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Caminho do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | O caminho do cookie da sessão determina o caminho para o qual o cookie será
    | considerado disponível. Normalmente, este será o caminho raiz de
    | sua aplicação, mas você está livre para alterar isso quando necessário.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Domínio do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode alterar o domínio do cookie usado para identificar uma sessão
    | em sua aplicação. Isso determinará quais domínios o cookie está
    | disponível em sua aplicação. Um padrão sensato foi definido.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Apenas Cookies HTTPS
    |--------------------------------------------------------------------------
    |
    | Definindo esta opção como true, os cookies de sessão só serão enviados de volta
    | para o servidor se o navegador tiver uma conexão HTTPS. Isso manterá
    | o cookie de ser enviado para você quando não puder ser feito de forma segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Apenas Acesso HTTP
    |--------------------------------------------------------------------------
    |
    | Configurando este valor como true, impedirá que o JavaScript acesse o
    | valor do cookie e o cookie só será acessível através
    | do protocolo HTTP. Você está livre para modificar esta opção, se necessário.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Cookies Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opção determina como seus cookies se comportam quando ocorrem solicitações
    | entre sites e pode ser usada para mitigar ataques CSRF. Por padrão, nós
    | definiremos esse valor como "lax", já que este é um valor padrão seguro.
    |
    | Suportados: "lax", "strict", "none", null
    |
    */

    'same_site' => 'lax',

    /*
    |--------------------------------------------------------------------------
    | Cookies Particionados
    |--------------------------------------------------------------------------
    |
    | Configurar este valor como true irá vincular o cookie ao site de nível superior para
    | um contexto entre sites. Cookies particionados são aceitos pelo navegador
    | quando sinalizados como "seguro" e o atributo Same-Site é definido como "none".
    |
    */

    'partitioned' => false,

];
