<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

class FindNoteByIdAction extends Action
{
    public function run(Transporter $transporter)
    {
        $note = Apiato::call('Note@FindNoteByIdTask', [$transporter->id]);

        // get the model
        $entity = $note->noteable;

        if (!$entity) {
            throw new NotFoundException();
        }

        // and now check, if the user has access to this
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        Apiato::call('Note@CanAuthorAccessNotesOnEntitySubAction', [$user, $entity->getResourceKey(), $entity->id]);

        return $note;
    }
}
