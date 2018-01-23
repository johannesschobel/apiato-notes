<?php

/**
 * @apiGroup           Note
 * @apiName            deleteNote
 *
 * @api                {DELETE} /v1/notes/:id Delete Note
 * @apiDescription     Delete a given note. The user must have access to the linked entity of the note.
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
$router->delete('notes/{id}', [
    'as' => 'api_note_delete_note',
    'uses'  => 'Controller@deleteNote',
    'middleware' => [
      'auth:api',
    ],
]);
