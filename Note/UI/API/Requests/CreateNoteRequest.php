<?php

namespace App\Containers\Note\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

/**
 * Class CreateNoteRequest.
 */
class CreateNoteRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'data.relationships.entity.data.id'
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        $entities = Config::get('note-container.entities', []);
        $entities = array_keys($entities);

        return [
            // put your rules here
            'data' => 'required|array',
            'data.type' => 'required|string' . '|' . Rule::in(['notes']),

            'data.attributes' => 'present|array',

            'data.attributes.content' => 'required|string|max:190',

            'data.relationships.entity.data.type' => 'required|string' . '|' . Rule::in($entities),
            'data.relationships.entity.data.id' => 'required',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
