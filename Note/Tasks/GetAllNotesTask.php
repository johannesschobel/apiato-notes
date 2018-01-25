<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllNotesTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class GetAllNotesTask extends Task
{

    /**
     * @var NoteRepository
     */
    private $repository;

    /**
     * GetAllNotesTask constructor.
     *
     * @param NoteRepository $repository
     */
    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
}
