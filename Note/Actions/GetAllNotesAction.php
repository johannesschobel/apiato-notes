<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Actions\Action;

class GetAllNotesAction extends Action
{
    public function run()
    {
        $notes = Apiato::call('Note@GetAllNotesTask');

        return $notes;
    }
}
