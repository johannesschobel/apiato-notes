<?php

namespace App\Containers\Note\Traits;

use App\Containers\Note\UI\API\Transformers\NoteTransformer;

/**
 * Trait EntityHasNotesTransformerTrait
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
trait EntityHasNotesTransformerTrait
{
    /**
     * @param $entity
     *
     * @return array
     */
    public function includeNotes($entity) {
        return $this->collection($entity->notes, new NoteTransformer());
    }
}