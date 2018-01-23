<?php

namespace App\Containers\Note\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class NoteRepository
 */
class NoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
