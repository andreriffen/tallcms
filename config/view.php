<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Caminhos de Armazenamento de Visualizações
    |--------------------------------------------------------------------------
    |
    | A maioria dos sistemas de modelagem de templates carrega templates do disco. Aqui você pode especificar
    | uma matriz de caminhos que devem ser verificados para suas visualizações. Claro
    | o caminho de visualização Laravel usual já foi registrado para você.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Caminho de Visualização Compilada
    |--------------------------------------------------------------------------
    |
    | Esta opção determina onde todos os templates Blade compilados serão
    | armazenados para sua aplicação. Normalmente, isso está dentro do diretório de armazenamento.
    | No entanto, como de costume, você é livre para alterar esse valor.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
