<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Containers\Note\Models\Note;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteNoteTask extends Task
{

    private $repository;

    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(Note $object)
    {
        try {
            return $this->repository->delete($object->id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
