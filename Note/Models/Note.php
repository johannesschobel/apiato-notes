<?php

namespace App\Containers\Note\Models;

use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Arcanedev\LaravelNotes\Models\Note as PackageNote;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class Note extends PackageNote
{
    use HashIdTrait;
    use HasResourceKeyTrait;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'author_id',
        'is_completed',
        'completed_at',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'notes';
}
