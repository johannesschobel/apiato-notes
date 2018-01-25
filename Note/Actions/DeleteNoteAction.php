<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Note\Tasks\DeleteNoteTask;
use App\Containers\Note\Tasks\FindNoteByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

/**
 * Class DeleteNoteAction
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class DeleteNoteAction extends Action
{
    public function run(Transporter $transporter)
    {
        $note = Apiato::call(FindNoteByIdTask::class, [$transporter->id]);

        // get the model
        $entity = $note->noteable;

        if (!$entity) {
            throw new NotFoundException();
        }

        // and now check, if the user has access to this
        $user = Apiato::call(GetAuthenticatedUserTask::class);

        Apiato::call(CanAuthorAccessNotesOnEntitySubAction::class, [$user, $entity->getResourceKey(), $entity->id]);

        $result = Apiato::call(DeleteNoteTask::class, [$note]);

        return $result;
    }
}
