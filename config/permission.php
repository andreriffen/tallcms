<?php

return [

    'models' => [

        /*
         * Ao usar o trait "HasPermissions" deste pacote, precisamos saber qual
         * modelo Eloquent deve ser usado para recuperar suas permissões. Claro,
         * muitas vezes é apenas o modelo "Permission", mas você pode usar o que quiser.
         *
         * O modelo que você deseja usar como modelo de Permissão precisa implementar o
         * contrato `Spatie\Permission\Contracts\Permission`.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * Ao usar o trait "HasRoles" deste pacote, precisamos saber qual
         * modelo Eloquent deve ser usado para recuperar suas funções. Claro,
         * muitas vezes é apenas o modelo "Role", mas você pode usar o que quiser.
         *
         * O modelo que você deseja usar como modelo de Função precisa implementar o
         * contrato `Spatie\Permission\Contracts\Role`.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * Ao usar o trait "HasRoles" deste pacote, precisamos saber qual
         * tabela deve ser usada para recuperar suas funções. Escolhemos um valor padrão
         * básico, mas você pode facilmente alterá-lo para qualquer tabela que desejar.
         */

        'roles' => 'roles',

        /*
         * Ao usar o trait "HasPermissions" deste pacote, precisamos saber qual
         * tabela deve ser usada para recuperar suas permissões. Escolhemos um valor padrão
         * básico, mas você pode facilmente alterá-lo para qualquer tabela que desejar.
         */

        'permissions' => 'permissions',

        /*
         * Ao usar o trait "HasPermissions" deste pacote, precisamos saber qual
         * tabela deve ser usada para recuperar as permissões de seus modelos. Escolhemos um
         * valor padrão básico, mas você pode facilmente alterá-lo para qualquer tabela que desejar.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * Ao usar o trait "HasRoles" deste pacote, precisamos saber qual
         * tabela deve ser usada para recuperar as funções de seus modelos. Escolhemos um
         * valor padrão básico, mas você pode facilmente alterá-lo para qualquer tabela que desejar.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * Ao usar o trait "HasRoles" deste pacote, precisamos saber qual
         * tabela deve ser usada para recuperar as permissões de funções. Escolhemos um
         * valor padrão básico, mas você pode facilmente alterá-lo para qualquer tabela que desejar.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [
        /*
         * Altere isso se você quiser nomear os pivôs relacionados de outra forma do que o padrão
         */
        'role_pivot_key' => null, // padrão 'role_id',
        'permission_pivot_key' => null, // padrão 'permission_id',

        /*
         * Altere isso se você quiser usar a chave primária do modelo relacionado de outra forma do que
         * `model_id`.
         *
         * Por exemplo, isso seria bom se suas chaves primárias fossem todas UUIDs. Em
         * nesse caso, nomeie isso `model_uuid`.
         */

        'model_morph_key' => 'model_id',

        /*
         * Altere isso se você quiser usar o recurso de equipes e a chave estrangeira do seu modelo relacionado
         * é diferente de `team_id`.
         */

        'team_foreign_key' => 'team_id',
    ],

    /*
     * Quando definido como true, o método para verificar permissões será registrado no portão.
     * Defina isso como false se você quiser implementar lógica personalizada para verificar permissões.
     */

    'register_permission_check_method' => true,

    /*
     * Quando definido como true, o ouvinte de eventos Laravel\Octane\Events\OperationTerminated será registrado
     * isso atualizará as permissões em cada TickTerminated, TaskTerminated e RequestTerminated
     * NOTA: Isso não deve ser necessário na maioria dos casos, mas uma combinação Octane/Vapor se beneficiou disso.
     */
    'register_octane_reset_listener' => false,

    /*
     * Recurso de Equipes.
     * Quando definido como true, o pacote implementa equipes usando o 'team_foreign_key'.
     * Se você quiser que as migrações registrem o 'team_foreign_key', você deve
     * definir isso como true antes de fazer a migração.
     * Se você já fez a migração, você deve fazer uma nova migração também
     * adicione 'team_foreign_key' a 'roles', 'model_has_roles' e 'model_has_permissions'
     * (veja a versão mais recente do arquivo de migração deste pacote)
     */

    'teams' => false,

    /*
     * Concessão de Credenciais do Cliente Passport
     * Quando definido como true, o pacote usará o Cliente do Passaporte para verificar permissões
     */
    'use_passport_client_credentials' => false,

    /*
     * Quando definido como true, os nomes de permissão necessários são adicionados às mensagens de exceção.
     * Isso poderia ser considerado uma violação de informações em alguns contextos, então o padrão
     * é false aqui para segurança ótima.
     */

    'display_permission_in_exception' => false,

    /*
     * Quando definido como true, os nomes de função necessários são adicionados às mensagens de exceção.
     * Isso poderia ser considerado uma violação de informações em alguns contextos, então o padrão
     * é false aqui para segurança ótima.
     */

    'display_role_in_exception' => false,

    /*
     * Por padrão, as pesquisas de permissão curinga estão desativadas.
     * Consulte a documentação para entender a sintaxe suportada.
     */

    'enable_wildcard_permission' => false,

    /*
     * A classe a ser usada para interpretar permissões curinga.
     * Se você precisar modificar os delimitadores, substitua a classe e especifique seu nome aqui.
     */
    // 'permission.wildcard_permission' => Spatie\Permission\WildcardPermission::class,

    /* Configurações específicas de cache */

    'cache' => [

        /*
         * Por padrão, todas as permissões são armazenadas em cache por 24 horas para acelerar o desempenho.
         * Quando as permissões ou funções são atualizadas, o cache é automaticamente limpo.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * A chave de cache usada para armazenar todas as permissões.
         */

        'key' => 'spatie.permission.cache',

        /*
         * Você pode indicar opcionalmente um driver de cache específico para uso com permissão e
         * cache de função usando qualquer um dos drivers 'store' listados no arquivo de configuração cache.php
         * Usando 'default' aqui significa usar o `default` definido em cache.php.
         */

        'store' => 'default',
    ],
];
