<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Nome da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor é o nome da sua aplicação. Este valor é usado quando o
    | framework precisa colocar o nome da aplicação em uma notificação ou
    | em qualquer outro local conforme necessário pela aplicação ou seus pacotes.
    |
    */

    'name' => env('APP_NAME', 'TallCMS'),

    /*
    |--------------------------------------------------------------------------
    | Ambiente da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor determina o "ambiente" em que sua aplicação está atualmente
    | sendo executada. Isso pode determinar como você prefere configurar
    | vários serviços que a aplicação utiliza. Configure isto em seu arquivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuração da Aplicação
    |--------------------------------------------------------------------------
    |
    | Quando sua aplicação está em modo de depuração, mensagens de erro detalhadas com
    | rastreamentos de pilha serão mostradas em cada erro que ocorre dentro da sua
    | aplicação. Se desativado, uma página de erro genérica simples será mostrada.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL da Aplicação
    |--------------------------------------------------------------------------
    |
    | Esta URL é usada pelo console para gerar corretamente URLs ao usar
    | a ferramenta de linha de comando Artisan. Você deve definir isso como
    | a raiz da sua aplicação para que seja usada ao executar tarefas do Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Fuso Horário da Aplicação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o fuso horário padrão para sua aplicação, que
    | será usado pelas funções de data e hora do PHP. Nós já configuramos
    | um valor padrão sensato para você por padrão.
    |
    */

    'timezone' => 'America/Sao_Paulo',

    /*
    |--------------------------------------------------------------------------
    | Configuração de Localidade da Aplicação
    |--------------------------------------------------------------------------
    |
    | A localidade da aplicação determina a localidade padrão que será usada
    | pelo provedor de serviços de tradução. Você é livre para definir este valor
    | para qualquer uma das localidades que serão suportadas pela aplicação.
    |
    */

    'locale' => 'pt_BR',

    /*
    |--------------------------------------------------------------------------
    | Localidade de Fallback da Aplicação
    |--------------------------------------------------------------------------
    |
    | A localidade de fallback determina a localidade a ser usada quando a
    | atual não estiver disponível. Você pode alterar o valor para corresponder
    | a qualquer uma das pastas de idioma que são fornecidas através da sua aplicação.
    |
    */

    'fallback_locale' => 'pt_BR',

    /*
    |--------------------------------------------------------------------------
    | Localidade do Faker
    |--------------------------------------------------------------------------
    |
    | Esta localidade será usada pela biblioteca Faker PHP ao gerar dados falsos
    | para as sementes do seu banco de dados. Por exemplo, isso será usado para obter
    | números de telefone localizados, informações de endereço de rua e mais.
    |
    */

    'faker_locale' => 'pt_BR',

    /*
    |--------------------------------------------------------------------------
    | Chave de Criptografia
    |--------------------------------------------------------------------------
    |
    | Esta chave é usada pelo serviço de criptografia Illuminate e deve ser definida
    | como uma string aleatória de 32 caracteres, caso contrário, essas strings criptografadas
    | não serão seguras. Por favor, faça isso antes de implantar uma aplicação!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Driver do Modo de Manutenção
    |--------------------------------------------------------------------------
    |
    | Estas opções de configuração determinam o driver usado para determinar e
    | gerenciar o status de "modo de manutenção" do Laravel. O driver "cache"
    | permitirá que o modo de manutenção seja controlado em várias máquinas.
    |
    | Drivers suportados: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Provedores de Serviço Carregados Automaticamente
    |--------------------------------------------------------------------------
    |
    | Os provedores de serviço listados aqui serão carregados automaticamente na
    | solicitação para sua aplicação. Sinta-se à vontade para adicionar seus próprios
    | serviços a esta matriz para conceder funcionalidade expandida às suas aplicações.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Provedores de Serviços de Pacotes...
         */

        /*
         * Provedores de Serviços da Aplicação...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\Filament\AdminPanelProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Alias de Classe
    |--------------------------------------------------------------------------
    |
    | Esta matriz de alias de classe será registrada quando esta aplicação
    | for iniciada. No entanto, sinta-se à vontade para registrar quantos
    | desejar,


    /*
    |--------------------------------------------------------------------------
    | Alias de Classe
    |--------------------------------------------------------------------------
    |
    | Esta matriz de alias de classe será registrada quando esta aplicação
    | for iniciada. No entanto, sinta-se à vontade para registrar quantos
    | desejar, já que os alias são carregados "lazy", então eles não afetam o desempenho.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
