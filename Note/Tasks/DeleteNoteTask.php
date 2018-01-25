<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Containers\Note\Models\Note;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteNoteTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class DeleteNoteTask extends Task
{

    /**
     * @var NoteRepository
     */
    private $repository;

    /**
     * DeleteNoteTask constructor.
     *
     * @param NoteRepository $repository
     */
    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Note $object
     *
     * @return int
     * @throws DeleteResourceFailedException
     */
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
