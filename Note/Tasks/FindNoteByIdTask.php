<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindNoteByIdTask extends Task
{

    private $repository;

    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
