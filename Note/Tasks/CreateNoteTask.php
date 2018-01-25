<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Data\Repositories\NoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreateNoteTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class CreateNoteTask extends Task
{

    /**
     * @var NoteRepository
     */
    private $repository;

    /**
     * CreateNoteTask constructor.
     *
     * @param NoteRepository $repository
     */
    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param       $author
     * @param       $model
     *
     * @return mixed
     * @throws CreateResourceFailedException
     */
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
