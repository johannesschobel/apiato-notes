<?php

namespace App\Containers\Note\Tasks;

use App\Containers\Note\Exceptions\UnknownEntityForNoteException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;

/**
 * Class ResolveEntityForNoteTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class ResolveEntityForNoteTask extends Task
{

    /**
     * @param $type the type of the entity you want to resolve
     * @param $id   the id of the entity
     *
     * @return mixed
     * @throws NotFoundException
     * @throws UnknownEntityForNoteException
     */
    public function run($type, $id)
    {
        $classname = Config::get("note-container.entities.{$type}.model");

        // check if the class does exist!
        if (! class_exists($classname)) {
            throw new UnknownEntityForNoteException();
        }

        $entity = $classname::find($id);

        if (! $entity) {
            throw new NotFoundException();
        }

        return $entity;
    }
}
