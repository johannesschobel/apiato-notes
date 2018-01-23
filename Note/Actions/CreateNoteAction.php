<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

class CreateNoteAction extends Action
{

    public function run(Transporter $transporter)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $data = $transporter->sanitizeInput([
            'data.attributes.content',
        ]);

        $data = $data['data']['attributes'];

        $relationship = $transporter->sanitizeInput([
            'data.relationships.entity.data.type',
            'data.relationships.entity.data.id',
        ]);

        $relationship = $relationship['data']['relationships']['entity']['data'];

        // find out if the user has access to the related entity
        $model = Apiato::call('Note@CanAuthorAccessNotesOnEntitySubAction', [$user, $relationship['type'], $relationship['id']]);

        $note = Apiato::call('Note@CreateNoteTask', [$data, $user, $model]);

        $note = Apiato::call('Note@FindNoteByIdTask', [$note->id]);

        return $note;
    }
}
