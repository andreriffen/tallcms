<?php

return [

    /*
     * Se definido como false, nenhuma atividade será salva no banco de dados.
     */
    'enabled' => env('ACTIVITY_LOGGER_ENABLED', true),

    /*
     * Quando o comando clean é executado, todas as atividades registradas mais antigas do que
     * o número de dias especificado aqui serão excluídas.
     */
    'delete_records_older_than_days' => 365,

    /*
     * Se nenhum nome de registro for passado para o helper activity()
     * usaremos este nome de registro padrão.
     */
    'default_log_name' => 'default',

    /*
     * Você pode especificar um driver de autenticação aqui que obtenha modelos de usuário.
     * Se isso for null, usaremos o driver de autenticação atual do Laravel.
     */
    'default_auth_driver' => null,

    /*
     * Se definido como true, o subject retornará modelos excluídos suavemente (soft deleted).
     */
    'subject_returns_soft_deleted_models' => false,

    /*
     * Este modelo será usado para registrar atividades.
     * Deve implementar a interface Spatie\Activitylog\Contracts\Activity
     * e estender Illuminate\Database\Eloquent\Model.
     */
    'activity_model' => \Spatie\Activitylog\Models\Activity::class,

    /*
     * Este é o nome da tabela que será criada pela migração e
     * usada pelo modelo Activity fornecido com este pacote.
     */
    'table_name' => 'activity_log',

    /*
     * Esta é a conexão de banco de dados que será usada pela migração e
     * pelo modelo Activity fornecido com este pacote. Caso não seja definido,
     * será usado o database.default do Laravel.
     */
    'database_connection' => env('ACTIVITY_LOGGER_DB_CONNECTION'),
];
