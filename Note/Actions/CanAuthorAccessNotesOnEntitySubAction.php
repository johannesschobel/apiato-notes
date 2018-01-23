<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Exceptions\ClassDoesNotExistException;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\SubAction;
use Illuminate\Support\Facades\Config;

class CanAuthorAccessNotesOnEntitySubAction extends SubAction
{
    /**
     * @param User   $user The user of the note
     * @param string $type
     * @param int    $id
     *
     * @throws ClassDoesNotExistException
     */
    public function run($user, $type, $id)
    {
        // resolve the model
        $model = Apiato::call('Note@ResolveEntityForNoteTask', [$type, $id]);

        $checker = Config::get("note-container.entities.{$type}.check");

        if (!class_exists($checker)) {
            throw new ClassDoesNotExistException();
        }

        Apiato::call($checker, [$user, $model]);

        return $model;
    }
}
