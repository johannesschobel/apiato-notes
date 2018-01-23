<?php

/**
 * @apiGroup           Note
 * @apiName            createNote
 *
 * @api                {POST} /v1/notes Create a new Note
 * @apiDescription     Create a new note and link it to an entity. The user must have access to this entity.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('notes', [
    'as' => 'api_note_create_note',
    'uses'  => 'Controller@createNote',
    'middleware' => [
      'auth:api',
    ],
]);
