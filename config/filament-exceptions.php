<?php

use BezhanSalleh\FilamentExceptions\Models\Exception;

return [

    'exception_model' => Exception::class,

    'slug' => 'exceptions',

    /** Mostrar ou ocultar na navegação/barra lateral */
    'navigation_enabled' => true,

    /** Ordem de classificação, se mostrado. Sem efeito se navigation_enabled estiver definido como false. */
    'navigation_sort' => 98,

    /** Se deve mostrar um distintivo de navegação. Sem efeito se navigation_enabled estiver definido como false. */
    'navigation_badge' => false,

    /** Se deve limitar exceções ao locatário */
    'is_scoped_to_tenant' => true,

    /** Ícones a serem usados para navegação (se ativada) e pílulas */
    'icons' => [
        'navigation' => 'fluentui-text-bullet-list-square-warning-16-o',
        'exception' => 'fluentui-text-bullet-list-square-warning-16-o',
        'headers' => 'heroicon-o-arrows-right-left',
        'cookies' => 'heroicon-o-circle-stack',
        'body' => 'heroicon-s-code-bracket',
        'queries' => 'heroicon-s-circle-stack',
    ],

    'is_globally_searchable' => false,

    /**-------------------------------------------------
     * Altere a guia ativa padrão
     *
     * Exception => 1 (Padrão)
     * Headers => 2
     * Cookies => 3
     * Body => 4
     * Queries => 5
     */
    'active_tab' => 5,

    /**-------------------------------------------------
     * Aqui você pode definir quando as exceções devem ser limpas
     * O padrão é 7 dias (uma semana)
     * O formato para fornecer o período deve seguir o formato do carbono. Ou seja,
     * 1 dia => 'subDay()',
     * 3 dias => 'subDays(3)',
     * 7 dias => 'subWeek()',
     * 1 mês => 'subMonth()',
     * 2 meses => 'subMonths(2)',
     *
     */

    'period' => now()->subWeek(),
];
