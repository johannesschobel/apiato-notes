<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Note\Models\Note;
use App\Containers\Note\Tasks\CreateNoteTask;
use App\Containers\Note\Tasks\FindNoteByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Transporters\Transporter;

/**
 * Class CreateNoteAction
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class CreateNoteAction extends Action
{

    /**
     * @param Transporter $transporter
     *
     * @return Note
     */
    public function run(Transporter $transporter) : Note
    {
        $user = Apiato::call(GetAuthenticatedUserTask::class);

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
        $model = Apiato::call(CanAuthorAccessNotesOnEntitySubAction::class, [$user, $relationship['type'], $relationship['id']]);

        $note = Apiato::call(CreateNoteTask::class, [$data, $user, $model]);

        $note = Apiato::call(FindNoteByIdTask::class, [$note->id]);

        return $note;
    }
}
