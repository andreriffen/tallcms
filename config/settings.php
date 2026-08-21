<?php

return [

    /*
     * Cada classe de configuração usada em sua aplicação deve ser registrada, você pode
     * colocá-las (manualmente) aqui.
     */
    'settings' => [

    ],

    /*
     * O caminho onde as classes de configuração serão criadas.
     */
    'setting_class_path' => app_path('Settings'),

    /*
     * Nestes diretórios, as migrações de configuração serão armazenadas e executadas ao migrar. Uma migração de configuração
     * criada via comando make:settings-migration será armazenada no primeiro caminho ou
     * um caminho definido personalizado ao executar o comando.
     */
    'migrations_paths' => [
        database_path('settings'),
    ],

    /*
     * Quando nenhum repositório foi definido para uma classe de configuração, o seguinte repositório
     * será usado para carregar e salvar configurações.
     */
    'default_repository' => 'database',

    /*
     * As configurações serão armazenadas e carregadas desses repositórios.
     */
    'repositories' => [
        'database' => [
            'type' => Spatie\LaravelSettings\SettingsRepositories\DatabaseSettingsRepository::class,
            'model' => null,
            'table' => null,
            'connection' => null,
        ],
        'redis' => [
            'type' => Spatie\LaravelSettings\SettingsRepositories\RedisSettingsRepository::class,
            'connection' => null,
            'prefix' => null,
        ],
    ],

    /*
     * O codificador e decodificador determinarão como as configurações são armazenadas e
     * recuperadas no banco de dados. Por padrão, `json_encode` e `json_decode`
     * são usados.
     */
    'encoder' => null,
    'decoder' => null,

    /*
     * O conteúdo das classes de configuração pode ser armazenado em cache por meio de sua aplicação,
     * as configurações serão armazenadas em um armazenamento Laravel fornecido e podem ter um
     * prefixo adicional.
     */
    'cache' => [
        'enabled' => env('SETTINGS_CACHE_ENABLED', false),
        'store' => null,
        'prefix' => null,
        'ttl' => null,
    ],

    /*
     * Esses casts globais serão usados automaticamente sempre que uma propriedade dentro
     * de sua classe de configuração não for um tipo padrão do PHP.
     */
    'global_casts' => [
        DateTimeInterface::class => Spatie\LaravelSettings\SettingsCasts\DateTimeInterfaceCast::class,
        DateTimeZone::class => Spatie\LaravelSettings\SettingsCasts\DateTimeZoneCast::class,
//        Spatie\DataTransferObject\DataTransferObject::class => Spatie\LaravelSettings\SettingsCasts\DtoCast::class,
        Spatie\LaravelData\Data::class => Spatie\LaravelSettings\SettingsCasts\DataCast::class,
    ],

    /*
     * O pacote procurará configurações nesses caminhos e as registrará automaticamente.
     */
    'auto_discover_settings' => [
        app_path('Settings'),
    ],

    /*
     * As classes de configuração automaticamente descobertas podem ser armazenadas em cache, para que elas não precisem
     * ser pesquisadas cada vez que a aplicação for inicializada.
     */
    'discovered_settings_cache_path' => base_path('bootstrap/cache'),
];
