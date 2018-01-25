<?php

namespace App\Containers\Note\UI\API\Transformers;

use App\Containers\Note\Models\Note;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class NoteTransformer
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class NoteTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'author',
    ];

    /**
     * @param Note $entity
     *
     * @return array
     */
    public function transform(Note $entity)
    {
        $response = [
            'object' => 'Note',
            'id' => $entity->getHashedKey(),

            'content' => $entity->content,
            'is_completed' => $entity->is_completed,
            'completed_at' => $entity->completed_at,

            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeAuthor(Note $note)
    {
        return $this->item($note->author, new UserTransformer());
    }
}
