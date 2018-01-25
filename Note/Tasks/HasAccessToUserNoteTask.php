<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Exceptions\NotAllowedToAccessEntityOfNoteException;
use App\Ship\Parents\Tasks\Task;

/**
 * Class HasAccessToUserNoteTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class HasAccessToUserNoteTask extends Task
{

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
