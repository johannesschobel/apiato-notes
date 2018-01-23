<?php

return [

    /* -----------------------------------------------------------------
     |  Database
     | -----------------------------------------------------------------
     */

    'database' => [
        'connection' => config('database.default'),

        'prefix'     => '',
    ],

    /* -----------------------------------------------------------------
     |  Models
     | -----------------------------------------------------------------
     */

    'authors' => [
        'table' => 'users',
        'model' => config('auth.providers.users.model', App\Containers\User\Models\User::class),
    ],

    'notes' => [
        'table' => 'notes',
        'model' => App\Containers\Note\Models\Note::class,
    ],

];
