<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Note\Tasks\FindNoteByIdTask;
use App\Containers\Note\Tasks\UpdateNoteTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

/**
 * Class UpdateNoteAction
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UpdateNoteAction extends Action
{
    /**
     * @param Transporter $transporter
     *
     * @return mixed
     * @throws NotFoundException
     */
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

        // get the data from the request
        $data = $transporter->sanitizeInput([
            'data.attributes.content',
            'data.attributes.is_completed'
        ]);

        $data = $data['data']['attributes'];

        // and update the note
        $note = Apiato::call(UpdateNoteTask::class, [$note, $data]);

        return $note;
    }
}
