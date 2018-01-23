<?php

/**
 * @apiGroup           Note
 * @apiName            getAllNotes
 *
 * @api                {GET} /v1/notes Get all Notes
 * @apiDescription     Get all notes (only accessible by ADMIN users)
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
$router->get('notes', [
    'as' => 'api_note_get_all_notes',
    'uses'  => 'Controller@getAllNotes',
    'middleware' => [
      'auth:api',
    ],
]);
