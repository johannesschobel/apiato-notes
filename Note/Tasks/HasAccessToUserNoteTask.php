<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Exceptions\NotAllowedToAccessEntityOfNoteException;
use App\Ship\Parents\Tasks\Task;

class HasAccessToUserNoteTask extends Task
{

    public function __construct()
    {
        // ..
    }

    /**
     * @param $user
     * @param $entity
     *
     * @return void
     * @throws NotAllowedToAccessEntityOfNoteException
     */
    public function run($user, $entity)
    {
        if ($user->id != $entity->id) {
            throw new NotAllowedToAccessEntityOfNoteException();
        }
    }
}
