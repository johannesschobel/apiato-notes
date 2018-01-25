<?php

namespace App\Containers\Note\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Note\Tasks\GetAllNotesTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class GetAllNotesAction
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class GetAllNotesAction extends Action
{
    /**
     * @return mixed
     */
    public function run()
    {
        $notes = Apiato::call(GetAllNotesTask::class);

        return $notes;
    }
}
