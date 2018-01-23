<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllNotesTask extends Task
{

    private $repository;

    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
