<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | Ao descomentar a configuração do Laravel Echo, você pode conectar o Filament
    | a qualquer servidor de websockets compatível com Pusher.
    |
    | Isso permitirá que seus usuários recebam notificações em tempo real.
    |
    */

    'broadcasting' => [

        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/api/v1/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Este é o disco de armazenamento que o Filament usará para armazenar arquivos. Você pode usar
    | qualquer um dos discos definidos em `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Caminho dos Ativos
    |--------------------------------------------------------------------------
    |
    | Este é o diretório onde os ativos do Filament serão publicados. É
    | relativo ao diretório `public` de sua aplicação Laravel.
    |
    | Depois de alterar o caminho, você deve executar `php artisan filament:assets`.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Caminho do Cache
    |--------------------------------------------------------------------------
    |
    | Este é o diretório que o Filament usará para armazenar arquivos de cache que
    | são usados para otimizar o registro de componentes.
    |
    | Depois de alterar o caminho, você deve executar `php artisan filament:cache-components`.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Atraso de Carregamento do Livewire
    |--------------------------------------------------------------------------
    |
    | Isso define o atraso antes de os indicadores de carregamento aparecerem.
    |
    | Definir isso como 'none' faz com que os indicadores apareçam imediatamente, o que pode ser
    | desejável para conexões de alta latência. Definir como 'default' aplica
    | o atraso padrão de 200ms do Livewire.
    |
    */

    'livewire_loading_delay' => 'default',

];
