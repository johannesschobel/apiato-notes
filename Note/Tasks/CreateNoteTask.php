<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateNoteTask extends Task
{

    private $repository;

    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data, $author, $model)
    {
        $data['is_completed'] = false;
        $data['completed_at'] = null;

        try {
            return $model->createNote($data['content'], $author);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
