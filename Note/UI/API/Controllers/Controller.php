<?php

namespace App\Containers\Note\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Note\Actions\CreateNoteAction;
use App\Containers\Note\Actions\DeleteNoteAction;
use App\Containers\Note\Actions\FindNoteByIdAction;
use App\Containers\Note\Actions\GetAllNotesAction;
use App\Containers\Note\Actions\UpdateNoteAction;
use App\Containers\Note\UI\API\Requests\CreateNoteRequest;
use App\Containers\Note\UI\API\Requests\DeleteNoteRequest;
use App\Containers\Note\UI\API\Requests\FindNoteByIdRequest;
use App\Containers\Note\UI\API\Requests\GetAllNotesRequest;
use App\Containers\Note\UI\API\Requests\UpdateNoteRequest;
use App\Containers\Note\UI\API\Transformers\NoteTransformer;
use App\Ship\Parents\Controllers\ApiController;

/**
 * Class Controller
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class Controller extends ApiController
{
    /**
     * @param CreateNoteRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNote(CreateNoteRequest $request)
    {
        $note = Apiato::call(CreateNoteAction::class, [$request->toTransporter()]);

        return $this->created($this->transform($note, NoteTransformer::class));
    }

    /**
     * @param FindNoteByIdRequest $request
     *
     * @return array
     */
    public function findNoteById(FindNoteByIdRequest $request)
    {
        $note = Apiato::call(FindNoteByIdAction::class, [$request->toTransporter()]);

        return $this->transform($note, NoteTransformer::class);
    }

    /**
     * @param GetAllNotesRequest $request
     *
     * @return array
     */
    public function getAllNotes(GetAllNotesRequest $request)
    {
        $notes = Apiato::call(GetAllNotesAction::class);

        return $this->transform($notes, NoteTransformer::class);
    }

    /**
     * @param UpdateNoteRequest $request
     *
     * @return array
     */
    public function updateNote(UpdateNoteRequest $request)
    {
        $note = Apiato::call(UpdateNoteAction::class, [$request->toTransporter()]);

        return $this->transform($note, NoteTransformer::class);
    }

    /**
     * @param DeleteNoteRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNote(DeleteNoteRequest $request)
    {
        Apiato::call(DeleteNoteAction::class, [$request->toTransporter()]);

        return $this->noContent();
    }
}
