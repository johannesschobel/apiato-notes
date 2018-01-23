<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Note Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /*
     * The entities you want to be noteable. This is used in the REQUEST classes
     */
    'entities' => [
        'users' => [
            'model' => \App\Containers\User\Models\User::class,
            'check' => \App\Containers\Note\Tasks\HasAccessToUserNoteTask::class,
        ]
    ]

];
