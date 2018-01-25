<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Note\Models\Note;
use App\Containers\Note\Tasks\FindNoteByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

/**
 * Class FindNoteByIdAction
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class FindNoteByIdAction extends Action
{
    /**
     * @param Transporter $transporter
     *
     * @return Note
     * @throws NotFoundException
     */
    public function run(Transporter $transporter) : Note
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

        return $note;
    }
}
