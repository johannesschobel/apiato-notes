<?php

/**
 * @apiGroup           Note
 * @apiName            updateNote
 *
 * @api                {PATCH} /v1/notes/:id Update Note
 * @apiDescription     Update a given note. The user must have access to the linked entity of the note.
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
$router->patch('notes/{id}', [
    'as' => 'api_note_update_note',
    'uses'  => 'Controller@updateNote',
    'middleware' => [
      'auth:api',
    ],
]);
